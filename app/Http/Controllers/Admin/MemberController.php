<?php


namespace App\Http\Controllers\Admin;


use App\Models\SiteModule;
use App\User;

use DateTime;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DataTables;

use Illuminate\Support\Facades\Hash;
class MemberController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','Members')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_write == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }
        return view('admin.member.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $permission = getModulePermission(auth()->id(), 7);
        if ($request->ajax()) {
            $data = User::where('role_id',3)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('userStatus', function($row){
                    $statusClass = ($row->status == 1) ? 'active' : '';
                    $btn = '<div data-id="'.$row->id.'" class="switch '.$statusClass.'" ></div>';

                    return $btn;
                })
                ->addColumn('action', function($row) use ($permission){
                    $btn = (auth()->user()->role_id == 1 || (!empty($permission) && $permission->can_edit == 1)) ? '<a href="'.route("member.edit" , ["user_id" => $row->id]).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>' : '';

                    $btn = (auth()->user()->role_id == 1 || (!empty($permission) && $permission->can_delete == 1)) ? $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct" onclick="return confirm("Are you sure you want to delete this item?");">Delete</a>' : $btn.'';

                    return $btn;
                })
                ->rawColumns(['userStatus','action'])
                ->make(true);
        }
        $users = User::where('role_id',3)->get();
        return view('admin.member.index', compact('users'));

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
            'email' => 'required|min:5|email',
            'phone' => 'required|min:5',
            'password' => 'required',
            
        ]);

        
        $data = $request->all();
        $data['role_id']=3;
        $data['status']=1;
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        //$user->userProfile()->create(['folio_no' => 'RMP'.$user->id]);

        return redirect()->route('member.create')->with('success','Member successfully Added!');;
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($userId)
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','Members')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_edit == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }
        $user = User::where('id', $userId)->first();
       
        return view('admin.member.edit', compact('user'));
    }

  
    public function update(Request $request, $userId)
    {
        /*$validateData = $request->validate([
            'name' => 'required|min:3|max:180',
            'email' => 'required|min:5',
        ]);*/

        $data = $request->all();

       


        $user = User::where('id', $userId)->first();
        $user->update($data);

        return redirect()->back()->with('success','Member Updated successfully!');
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

   



    /**
     * @param Request $request
     * @param $userId
     * @return mixed
     */
   
    public function destroy($id){

        $user = auth()->user();
        $getModule = SiteModule::where('name','Members')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_delete == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }

        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['status' => 200]);
    }


}
