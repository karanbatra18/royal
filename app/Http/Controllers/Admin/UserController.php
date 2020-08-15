<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller {
   public function create() {
       
     
   }
	
   public function index(Request $request) {
   return view('admin.user.create');
   }
   
       public function store(StoreUserProfile $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:180',
            'email' => 'required|min:5',
            ]);

      
        $data = $request->all();
        

        $user = User_profile::create($data);
      

        return redirect()->route('user.index');
    }

}
