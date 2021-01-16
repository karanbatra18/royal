<?php


namespace App\Http\Controllers\Admin;

use App\Country;
use App\Models\Caste;
use App\User;
use App\UserProfile;
use PDF;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class MatchController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, $birthdayDate = null)
    {
        $countries = Country::get(["name", "id"]);
        $castes = Caste::where('parent_id', 0)->orderBy('name')->get();
        $users = User::where('role_id', 2)->get();
        return view('admin.match.index', compact('users', 'countries', 'castes'));

    }

    public function printProfile(Request $request, $id)
    {

            $user = User::with('userProfile')->where('id', $id)->firstOrFail();
            $userProfile = $user->userProfile()->first();

            view()->share(['user' => $user, 'userProfile' => $userProfile]);

            //$pdf = PDF::loadHtml('emails.profile.pdf');
            $pdf = PDF::loadView('emails.profile.pdf')->stream();

            return $pdf;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendProfile(Request $request)
    {
        if (isset($request->ids) && count($request->ids)) {
            $profileIds = $request->ids;
            $currentUser = $request->user_id;
            $selectedUser = User::with('sentProfiles')->where('id', $currentUser)->first();
            $users = User::with('userProfile')->whereIn('id', $profileIds)->get();
            $userSentProfiles = $selectedUser->sentProfiles()->pluck('receiver_id')->toArray();
            foreach ($users as $user) {
                $userProfile = $user->userProfile()->first();

                view()->share(['user' => $user, 'userProfile' => $userProfile]);
                $pdf = PDF::loadView('emails.profile.pdf');
                $data['email'] = $selectedUser->email;
                $data['name'] = $selectedUser->full_name;
                try {
                    Mail::send('emails.profile.pdf', [$data], function ($message) use ($pdf, $data) {
                        $message->to($data['email'], $data['name'])
                            ->subject('Royal Matrimonial - Profile Suggestion')
                            ->attachData($pdf->output(), "profile.pdf");
                    });
                    if(!in_array($user->id,$userSentProfiles)) {
                        $selectedUser->sentProfiles()->create(['receiver_id' => $user->id]);
                    }

                } catch (JWTException $exception) {
                    $this->serverstatuscode = "0";
                    $this->serverstatusdes = $exception->getMessage();
                }
                if (Mail::failures()) {
                    $this->statusdesc = "Error sending mail";
                    $this->statuscode = "0";

                } else {

                    $this->statusdesc = "Message sent Succesfully";
                    $this->statuscode = "1";
                }

            }
            return response()->json(compact('this'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'first_name' => 'required|min:3|max:180',
            'last_name' => 'required|min:3|max:180',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required|min:5|email',
            'marital_status' => 'required',
            'phone' => 'required|min:5',
            'password' => 'required',
        ]);


        $data = $request->all();
        $data['dob'] = date('Y-m-d', strtotime($request->dob));
        $user = User::create($data);
        $user->userProfile()->create([]);

        return redirect()->route('user.create')->with('success', 'User successfully Added!');;
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($userId)
    {
        $user = User::where('id', $userId)->first();
        $userProfile = $user->userProfile()->first();
        return view('admin.user.edit', compact('user', 'userProfile'));
    }

    /**
     * @param Request $request
     * @param $userId
     * @return mixed
     */
    public function update(Request $request, $userId)
    {
        /*$validateData = $request->validate([
            'name' => 'required|min:3|max:180',
            'email' => 'required|min:5',
        ]);*/

        $data = $request->all();
        $user = User::where('id', $userId)->first();
        $user->update($data);

        return redirect()->back()->with('success', 'Information Updated successfully!');
    }

    /**
     * @param Request $request
     * @param $userId
     * @return mixed
     */
    public function updateProfile(Request $request, $userId)
    {
        $data = $request->except(['_method', '_token']);
        $user = User::where('id', $userId)->first();
        $user->userProfile()->update($data);

        return redirect()->back()->with('success', 'Information Updated successfully!');
    }

    public function serachFilteredUser(Request $request)
    {
        $conditionId = !empty($request->id) ? ['users.id' => $request->id] : [];
        $user = DB::table('users')->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->select(
                'users.id',
                'users.gender',
                'users.first_name',
                'users.last_name',
                'users.email',
                'users.dob',
                'users.marital_status',
                'users.age',
                'user_profiles.state',
                'user_profiles.city',
                'user_profiles.mangalik_status',
                'user_profiles.caste_id',
                'user_profiles.sub_caste_id',
                'user_profiles.higher_education',
                'user_profiles.college',
                'user_profiles.profile_picture1',
                'user_profiles.profile_picture2',
                'user_profiles.profile_picture3',
                'user_profiles.profile_picture4',
                'user_profiles.profile_picture5'
            )
            ->where($conditionId)
            ->first();


        $response = [];
        if (!empty($user)) {
            $userGender = $user->gender;
            $userAge = $user->age;

            $userCasteId = !empty($request->caste_id) ? $request->caste_id : $user->caste_id;
            $maritalStatus = !empty($request->marital_status) ? $request->marital_status : $user->marital_status;

            if (!empty($userAge)) {
                $upperAge = $userAge + 2;
                $lowerAge = $userAge - 2;
            }

            $genderCondition = $userGender == 'male' ? ['users.gender' => 'female'] : ['users.gender' => 'male'];
            $casteCondition = !empty($userCasteId) ? ['user_profiles.caste_id' => $userCasteId] : [];
            $maritalStatusCondition = !empty($maritalStatus) ? ['users.marital_status' => $maritalStatus] : [];
            //$ageCondition = !empty($userAge) ? [['users.age', '<=', $upperAge], ['users.age', '>=', $lowerAge]] : [];

            $profileManagedByCondition = !empty($request->profile_managed_by) ? ['user_profiles.profile_managed_by' => $request->profile_managed_by] : [];
            $occupationCondition = !empty($request->occupation) ? ['user_profiles.occupation' => $request->occupation] : [];
            $challangedCondition = !empty($request->challanged) ? ['user_profiles.challanged' => $request->challanged] : [];
            $annualIncomeCondition = !empty($request->annual_income) ? ['user_profiles.annual_income' => $request->annual_income] : [];

            $motherTongueCondition = !empty($request->mother_tongue) ? ['user_profiles.mother_tongue' => $request->mother_tongue] : [];
            $subCastCondition = !empty($request->sub_caste_id) ? ['user_profiles.sub_caste_id' => $request->sub_caste_id] : [];
            $religionCondition = !empty($request->religion) ? ['user_profiles.religion' => $request->religion] : [];
            $countryCondition = !empty($request->country) ? ['user_profiles.country' => $request->country] : [];
            $stateCondition = !empty($request->state) ? ['user_profiles.state' => $request->state] : [];
            $cityCondition = !empty($request->city) ? ['user_profiles.city' => $request->city] : [];
            $smokeCondition = !empty($request->smoke) ? ['user_profiles.smoke' => $request->smoke] : [];
            $drinkCondition = !empty($request->drink) ? ['user_profiles.drink' => $request->drink] : [];
            $ownHouseCondition = !empty($request->own_house) ? ['user_profiles.own_house' => $request->own_house] : [];
            $nonVegCondition = !empty($request->non_veg) ? ['user_profiles.non_veg' => $request->non_veg] : [];

            $otherProfiles = DB::table('users')->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->select(
                    'users.id',
                    'users.first_name',
                    'users.last_name',
                    'users.email',
                    'users.dob',
                    'users.marital_status',
                    'users.age',
                    'user_profiles.state',
                    'user_profiles.city',
                    'user_profiles.mangalik_status',
                    'user_profiles.caste_id',
                    'user_profiles.sub_caste_id',
                    'user_profiles.higher_education',
                    'user_profiles.college',
                    'user_profiles.profile_picture1',
                    'user_profiles.profile_picture2',
                    'user_profiles.profile_picture3',
                    'user_profiles.profile_picture4',
                    'user_profiles.profile_picture5'
                )
                ->where($genderCondition)
                ->where($casteCondition)
                ->where($maritalStatusCondition)
                ->where($motherTongueCondition)
                ->where($subCastCondition)
                ->where($religionCondition)
                ->where($countryCondition)
                ->where($stateCondition)
                ->where($cityCondition)
                ->where($drinkCondition)
                ->where($smokeCondition)
                ->where($ownHouseCondition)
                ->where($nonVegCondition)
                ->where($profileManagedByCondition)
                ->where($occupationCondition)
                ->where($challangedCondition)
                ->where($annualIncomeCondition)
                ->paginate(10);
            //->get();

            $returnHTML = view('admin.match.search_profile')->with(compact('user'))->render();
            if ($otherProfiles->count()) {
                $returnOtherHTML = view('admin.match.matched_profiles')->with(compact('otherProfiles'))->render();
            } else {
                $returnOtherHTML = '<p class="text-align:center">No Match Found</p>';
            }

            $response['status'] = 200;
            $response['html'] = $returnHTML;
            $response['otherHtml'] = $returnOtherHTML;
        } else {
            $response['status'] = 402;
            $response['html'] = '<p class="text-align:center">No Profile Found</p>';
            $response['otherHtml'] = '<p class="text-align:center">No Match Found</p>';
        }

        return Response::json($response);
    }

    public function serachUser(Request $request)
    {
        // dd($request->all());
        $conditionId = !empty($request->id) ? ['users.id' => $request->id] : [];
        $user = DB::table('users')->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->select(
                'users.id',
                'users.gender',
                'users.first_name',
                'users.last_name',
                'users.email',
                'users.dob',
                'users.marital_status',
                'users.age',
                'user_profiles.state',
                'user_profiles.city',
                'user_profiles.mangalik_status',
                'user_profiles.caste_id',
                'user_profiles.sub_caste_id',
                'user_profiles.higher_education',
                'user_profiles.college',
                'user_profiles.profile_picture1',
                'user_profiles.profile_picture2',
                'user_profiles.profile_picture3',
                'user_profiles.profile_picture4',
                'user_profiles.profile_picture5',
                'user_profiles.default_pic'
            )
            ->where($conditionId)
            ->first();

        //dd($user);
        $response = [];
        if (!empty($user)) {
            $userGender = $user->gender;
            $userAge = $user->age;
            $userCasteId = $user->caste_id;
            $maritalStatus = $user->marital_status;
            $userMain = User::where('id',$user->id)->first();
            $userSentProfiles = $userMain->sentProfiles()->pluck('receiver_id')->toArray();
            if (!empty($userAge)) {
                $upperAge = $userAge + 2;
                $lowerAge = $userAge - 2;
            }

            $genderCondition = $userGender == 'male' ? ['users.gender' => 'female'] : ['users.gender' => 'male'];
            $casteCondition = !empty($userCasteId) ? ['user_profiles.caste_id' => $userCasteId] : [];
            $maritalStatusCondition = !empty($maritalStatus) ? ['users.marital_status' => $maritalStatus] : [];
            $ageCondition = !empty($userAge) ? [['users.age', '<=', $upperAge], ['users.age', '>=', $lowerAge]] : [];
            $ageCondition = !empty($userAge) ? [['users.age', '<=', $upperAge], ['users.age', '>=', $lowerAge]] : [];

            $otherProfiles = DB::table('users')->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->select(
                    'users.id',
                    'users.first_name',
                    'users.last_name',
                    'users.email',
                    'users.dob',
                    'users.marital_status',
                    'users.age',
                    'user_profiles.state',
                    'user_profiles.city',
                    'user_profiles.mangalik_status',
                    'user_profiles.caste_id',
                    'user_profiles.sub_caste_id',
                    'user_profiles.higher_education',
                    'user_profiles.college',
                    'user_profiles.profile_picture1',
                    'user_profiles.profile_picture2',
                    'user_profiles.profile_picture3',
                    'user_profiles.profile_picture4',
                    'user_profiles.profile_picture5',
                    'user_profiles.default_pic'
                )
                ->where($genderCondition)
                ->where($casteCondition)
                ->where($ageCondition)
                ->where($maritalStatusCondition)
                ->paginate(10);

            $returnHTML = view('admin.match.search_profile')->with(compact('user'))->render();
            if ($otherProfiles->count()) {
                $returnOtherHTML = view('admin.match.matched_profiles')->with(compact('otherProfiles','userSentProfiles'))->render();
            } else {
                $returnOtherHTML = '<p class="text-align:center">No Match Found</p>';
            }

            $response['status'] = 200;
            $response['html'] = $returnHTML;
            $response['otherHtml'] = $returnOtherHTML;
        } else {
            $response['status'] = 402;
            $response['html'] = '<p class="text-align:center">No Profile Found</p>';
            $response['otherHtml'] = '<p class="text-align:center">No Match Found</p>';
        }

        return Response::json($response);
    }

}
