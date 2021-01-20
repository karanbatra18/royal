<?php


namespace App\Http\Controllers\Admin;

use App\Models\Caste;
use App\Models\SiteModule;
use App\Models\SitePermission;
use App\User;
use App\Country;
use App\UserProfile;
use DateTime;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DataTables;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','User Management')->first();
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
    public function index(Request $request)
    {
        $permission = getModulePermission(auth()->id(), 1);
        if ($request->ajax()) {
            $data = User::where('role_id',2)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('userStatus', function($row) use ($permission){
                    $statusClass = ($row->status == 1) ? 'active' : '';
                    $btn = (auth()->user()->role_id == 1 || (!empty($permission) && $permission->can_activate == 1)) ? '<div data-id="'.$row->id.'" class="switch '.$statusClass.'" ></div>' : '';

                    return $btn;
                })
                ->addColumn('action', function($row) use ($permission){

                        $btn = (auth()->user()->role_id == 1 || (!empty($permission) && $permission->can_edit == 1)) ? '<a href="' . route("user.edit", ["user_id" => $row->id]) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>' : '';


                        $btn = (auth()->user()->role_id == 1 || (!empty($permission) && $permission->can_delete == 1)) ? $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>' :  $btn . '';

                    return $btn;
                })
                ->addColumn('vip_status', function($row){
                    $statusClass = ($row->is_vip == 1) ? 'active' : '';
                    $btn = '<div data-id="'.$row->id.'" class="switch_vip '.$statusClass.'" ></div>';

                    return $btn;
                })
                ->rawColumns(['userStatus','action','vip_status'])
                ->make(true);
        }
        $users = User::get();
        return view('admin.user.index', compact('users'));

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
       // value['userData']['dob'] = date('Y-m-d', strtotime($value['userData']['dob']));
        $from = new DateTime($data['dob']);
        $to = new DateTime('today');
        $age = $from->diff($to)->y;
        $data['age'] = $age;

        $user = User::create($data);
        $user->userProfile()->create(['folio_no' => 'RMP'.$user->id]);

        return redirect()->route('user.create')->with('success','User successfully Added!');
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($userId)
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','User Management')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_edit == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }

        $user = User::where('id', $userId)->first();
        $userProfile = $user->userProfile()->first();
        $mainCast = !empty($userProfile->caste_id) ? $userProfile->caste_id : 0;
        $castes = Caste::where('parent_id',0)->orderBy('name')->get();
        //dd($userProfile);
        if($mainCast) {
            $subCastes = Caste::where('parent_id',$mainCast)->orderBy('name')->get();
        } else {
            $subCastes = Caste::where('parent_id','!=',0)->orderBy('name')->get();
        }

        $countries= Country::get(["name","id"]);
        return view('admin.user.edit', compact('user', 'userProfile','countries','castes','subCastes'));
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($userId)
    {

        $user = User::where('id', $userId)->first();
        $userProfile = $user->userProfile()->first();
        $mainCast = !empty($userProfile->caste_id) ? $userProfile->caste_id : 0;
        $castes = Caste::where('parent_id',0)->orderBy('name')->get();
        if($mainCast) {
            $subCastes = Caste::where('parent_id',$mainCast)->orderBy('name')->get();
        } else {
            $subCastes = Caste::where('parent_id','!=',0)->orderBy('name')->get();
        }

        $countries= Country::get(["name","id"]);
        return view('admin.user.show', compact('user', 'userProfile','countries','castes','subCastes'));
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

        if(isset($request->dob) && !empty($request->dob)) {
            $data['dob'] = date('Y-m-d', strtotime($request->dob));
            // value['userData']['dob'] = date('Y-m-d', strtotime($value['userData']['dob']));
            $from = new DateTime($data['dob']);
            $to = new DateTime('today');
            $age = $from->diff($to)->y;
            $data['age'] = $age;
        }


        $user = User::where('id', $userId)->first();
        $user->update($data);

        return redirect()->back()->with('success','Information Updated successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        $status = $request->status;
        $data = [
            'status' => $status
        ];
        $user = User::where('id', $id)->first();
        $user->update($data);

        return redirect()->back()->with('success','Information Updated successfully!');
    }

    public function updateVip(Request $request, $id)
    {
        $status = $request->status;
        $data = [
            'is_vip' => $status
        ];
        $user = User::where('id', $id)->first();
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
        //dd($request->all());

        $data = $request->except(['_method', '_token']);

        if(isset($request->upload_images) && isset($request->file) && count($request->file)) {
            $data = [];
            foreach($request->file as $key => $oneFile) {
                $imageName = time().'.'.$oneFile->extension();

                $oneFile->move(public_path('assets/images/users'), $imageName);
                $data[$key] = $imageName;
            }
        }

        $user = User::where('id', $userId)->first();
        $user->userProfile()->update($data);

        return redirect()->back()->with('success','Information Updated successfully!');
    }

    public function destroy($id){
        $user1 = auth()->user();
        $getModule = SiteModule::where('name','User Management')->first();
        if($user1->role_id != 1) {
            $permission = getModulePermission($user1->id,$getModule->id);
            if(empty($permission) || $permission->can_delete == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['status' => 200]);
    }

    public function permissions(Request $request){
        $user = null;
        $siteModules = SiteModule::get();
        $users = User::where('role_id',2)->get();

        if(isset($request->user) && !empty($request->user)) {
            $user = User::where('id',$request->user)->first();
        }
        //dd($user);
        return view('admin.user.permissions', compact('siteModules','users', 'user'));
    }

    public function savePermissions(Request $request, $id){
        if(isset($request->permission) && count($request->permission)) {

            foreach($request->permission as $key => $onePermission) {
                //dd($onePermission);
                SitePermission::updateOrCreate([
                    'user_id' => $id,
                    'site_module_id' => $key,
                ],$onePermission);
            }
        }

        //$users = User::where('role_id',2)->get();
        return redirect()->back();
    }



}
