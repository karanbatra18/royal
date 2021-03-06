<?php


namespace App\Http\Controllers\Admin;

use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BirthdayController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','Birthday Lisitng')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_write == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }
        return view('admin.user.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request,$birthdayDate = null)
    {
      
        $birthdayDate = date('Y-m-d',strtotime($birthdayDate));
       // $condition = ['dob' => $birthdayDate];
       //   dd($birthdayDate);
        $users = User::whereDate('dob', $birthdayDate)->get();
        return view('admin.user.birthday', compact('users','birthdayDate'));

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
        $user = auth()->user();
        $getModule = SiteModule::where('name','Birthday Lisitng')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_edit == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }
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


}
