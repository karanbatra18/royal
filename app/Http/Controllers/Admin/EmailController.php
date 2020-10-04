<?php


namespace App\Http\Controllers\Admin;

use App\Models\Email;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class EmailController extends Controller
{
   public function index()
    {
        $email = Email::get();
        return view('admin.email.index', compact('email'));
        
    }
    
     public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3|max:180',
            'description' => 'required|min:10',
        ]);
        $data = $request->all();
      
        $email = Email::create($data);
      
        return redirect()->route('email.index')->with('success',' successfully Added!');;
    }
    
    public function edit($EmailId)
    {
        $email = Email::where('id', $EmailId)->first();
        return view('admin.email.edit', compact('email'));
    }
    
     public function update(Request $request, $EmailId)
    {
         $validateData = $request->validate([
            'title' => 'required|min:3|max:180',
            'description' => 'required|min:10',
        ]);
        $data = $request->all();
      
        $email = Email::where('id', $EmailId)->first();
        $email->update($data);
        return redirect()->back()->with('success','Email Updated successfully!');
    }


   
}