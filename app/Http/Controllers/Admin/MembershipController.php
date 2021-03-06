<?php


namespace App\Http\Controllers\Admin;

use App\Models\Membership;
use App\Models\SiteModule;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MembershipController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','Membership')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_write == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }
        return view('admin.membership.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $memberships = Membership::get();
        return view('admin.membership.index', compact('memberships'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3|max:180',
        ]);
        $data = $request->all();
      
        $caste = $request->caste;
        $data['caste'] =implode(",",$caste);
        $membership = Membership::create($data);
      
        return redirect()->route('membership.index')->with('success',' successfully Added!');;
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($membershipId)
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','Membership')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_edit == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }
        $membership = Membership::where('id', $membershipId)->first();
        return view('admin.membership.edit', compact('membership'));
    }

    /**
     * @param Request $request
     * @param $userId
     * @return mixed
     */
    public function update(Request $request, $membershipId)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3|max:180',
               ]);
        $data = $request->all();
      
        $caste = $request->caste;
        $data['caste'] =implode(",",$caste);
       
        $membership = Membership::where('id', $membershipId)->first();
        $membership->update($data);
        return redirect()->back()->with('success','Plan Updated successfully!');
    }

   

}
