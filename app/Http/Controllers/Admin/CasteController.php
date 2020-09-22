<?php


namespace App\Http\Controllers\Admin;

use App\Models\Caste;
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
        $validateData = $request->validate([
            'name' => 'required|min:3|max:180',
        ]);
        $data = $request->all();
      
        $cast = Caste::create($data);
      
        return redirect()->route('caste.index')->with('success',' successfully Added!');;
    }
    
    public function edit($castId)
    {
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
