<?php


namespace App\Http\Controllers\Admin;

use App\UserProfile;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.user.create');
    }

    public function index(Request $request)
    {
        $users = UserProfile::get();
        return view('admin.user.index', compact('users'));
 
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:180',
            'email' => 'required|min:5',
        ]);


        $data = $request->all();

        $user = UserProfile::create($data);


        return redirect()->route('user.create');
    }
    
     public function edit()
    {
             return view('admin.user.edit');
    }


}
