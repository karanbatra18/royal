<?php


namespace App\Http\Controllers\Admin;

use App\Models\Swyamber;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SwyamberController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::get();
        return view('admin.swyamber.create',compact('users'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $swyambers = Swyamber::get();
        return view('admin.swyamber.index', compact('swyambers'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'title' => 'required|min:3|max:180',
            'place' => 'required|min:3|max:180',
            'swyamber_date' => 'required',
        ]);

        $maleMembers = $request->male_member;
        $femaleMembers = $request->female_member;
        $members = array_merge($maleMembers, $femaleMembers);

        $data = $request->except('male_member', 'female_member', '_token');
        $data['swyamber_date'] = date('Y-m-d', strtotime($request->swyamber_date));
        $swyamber = Swyamber::create($data);
        $swyamber->users()->attach($members);

        return redirect()->route('admin.swyamber.index')->with('success','Swyamber successfully Added!');;
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($swyamberId)
    {
        $users = User::get();
        $swyamber = Swyamber::with('users')->where('id', $swyamberId)->first();
        $members = $swyamber->users()->pluck('users.id')->toArray();
        return view('admin.swyamber.edit', compact('swyamber', 'users', 'members'));
    }

    /**
     * @param Request $request
     * @param $userId
     * @return mixed
     */
    public function update(Request $request, $swyamberId)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3|max:180',
            'place' => 'required|min:3|max:180',
            'swyamber_date' => 'required',
        ]);

        $maleMembers = $request->male_member;
        $femaleMembers = $request->female_member;
        $members = array_merge($maleMembers, $femaleMembers);

        $data = $request->except('male_member', 'female_member', '_token');
        $data['swyamber_date'] = date('Y-m-d', strtotime($request->swyamber_date));

        $swyamber = Swyamber::where('id', $swyamberId)->first();
        $swyamber->update($data);
        $swyamber->users()->sync($members);

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
