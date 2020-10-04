<?php


namespace App\Http\Controllers\Admin;

use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
    public function index(Request $request,$birthdayDate = null)
    {

        $users = User::get();
        return view('admin.match.index', compact('users'));

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

        return redirect()->route('user.create')->with('success','User successfully Added!');;
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

        return redirect()->back()->with('success','Information Updated successfully!');
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

        return redirect()->back()->with('success','Information Updated successfully!');
    }

    public function serachUser(Request $request){
       // dd($request->all());
        $conditionEmail = !empty($request->selected_email) ? ['users.email' => $request->selected_email] : [];
        $conditionFolio = !empty($request->selected_folio) ? ['user_profiles.folio_no' => $request->selected_folio] : [];
        $user = DB::table('users')->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->select('users.id','users.gender','users.first_name', 'users.last_name','users.email','users.dob','users.marital_status', 'users.age','user_profiles.state', 'user_profiles.city', 'user_profiles.mangalik_status', 'user_profiles.caste_id', 'user_profiles.sub_caste_id', 'user_profiles.higher_education', 'user_profiles.college')
            ->where($conditionEmail)
            ->where($conditionFolio)
            ->first();


        $response = [];
        if(!empty($user)){
            $userGender = $user->gender;
            $userAge = $user->age;
            $userCasteId = $user->caste_id;
            $maritalStatus = $user->marital_status;

            if(!empty($userAge)) {
                $upperAge = $userAge + 2;
                $lowerAge = $userAge - 2;
            }

            $genderCondition = $userGender == 'male' ? ['users.gender' => 'female'] : ['users.gender' => 'male'];
            $casteCondition = !empty($userCasteId) ? ['user_profiles.caste_id' => $userCasteId] : [];
            $maritalStatusCondition = !empty($maritalStatus) ? ['users.marital_status' => $maritalStatus] : [];
            $ageCondition = !empty($userAge) ? [['users.age', '<=', $upperAge], ['users.age', '>=', $lowerAge]] : [];

            $otherProfiles = DB::table('users')->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->select('users.id','users.first_name', 'users.last_name','users.email','users.dob','users.marital_status', 'users.age','user_profiles.state', 'user_profiles.city', 'user_profiles.mangalik_status', 'user_profiles.caste_id', 'user_profiles.sub_caste_id', 'user_profiles.higher_education', 'user_profiles.college')
                ->where($genderCondition)
                ->where($casteCondition)
                ->where($ageCondition)
                ->where($maritalStatusCondition)
                ->get();

            $returnHTML = view('admin.match.search_profile')->with(compact('user'))->render();
            if($otherProfiles->count()){
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

}
