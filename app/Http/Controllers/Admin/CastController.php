<?php


namespace App\Http\Controllers\Admin;

use App\Cast;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class CastController extends Controller
{
   public function index()
    {
        $cast = Cast::get();
        $pcast = Cast::where('parent_id', 0)->get();
        return view('admin.caste.index', compact('cast','pcast'));
        
    }
    
     public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:180',
        ]);
        $data = $request->all();
      
        $cast = Cast::create($data);
      
        return redirect()->route('caste.index')->with('success',' successfully Added!');;
    }
    
    public function edit($castId)
    {
        $cast = Cast::where('id', $castId)->first();
        $pcast = Cast::where('parent_id', 0)->get();
        return view('admin.caste.edit', compact('cast','pcast'));
    }
    
     public function update(Request $request, $castId)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:180',
               ]);
        $data = $request->all();
      
        $cast = Cast::where('id', $castId)->first();
        $cast->update($data);
        return redirect()->back()->with('success','Caste Updated successfully!');
    }


   
}
