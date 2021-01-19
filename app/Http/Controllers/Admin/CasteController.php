<?php


namespace App\Http\Controllers\Admin;

use App\Models\Caste;
use App\Models\SiteModule;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class CasteController extends Controller
{
   public function index()
    {
        $pCasts = Caste::where('parent_id', 0)->get();
        return view('admin.caste.index', compact('pCasts'));
        
    }
    
     public function store(Request $request)
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','Caste Management')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_write == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }

        $validateData = $request->validate([
            'name' => 'required|min:3|max:180',
        ]);
        $data = $request->all();
      
        $cast = Caste::create($data);
      
        return redirect()->route('caste.index')->with('success',' successfully Added!');;
    }
    
    public function edit($castId)
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','Caste Management')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_edit == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('admin.dashboard')->with($response);
            }
        }

        $cast = Caste::where('id', $castId)->first();
        $pcast = Caste::where('parent_id', 0)->get();
        return view('admin.caste.edit', compact('cast','pcast'));
    }
    
     public function update(Request $request, $castId)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:180',
               ]);
        $data = $request->all();
      
        $cast = Caste::where('id', $castId)->first();
        $cast->update($data);
        return redirect()->back()->with('success','Caste Updated successfully!');
    }

    public function getSubCastes(Request $request)
    {
        $id = $request->caste_id;
        $castes = Caste::where('parent_id', $id)->get();
        $data = [
            'status' => 200,
            'castes' => $castes,
        ];
        return response()->json($data);
       // return view('admin.caste.index', compact('pCasts'));

    }
   
}
