<?php


namespace App\Http\Controllers\Admin;

use App\Models\Lead;
use App\User;
use App\Country;
use App\UserProfile;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DataTables;

class LeadController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::get();
        $countries= Country::get(["name","id"]);
        return view('admin.lead.create',compact('users','countries'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
      public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Lead::latest()->get();
            return Datatables::of($data)
               ->addColumn('action', function($row){
                    $btn = '<a href="'.route("lead.edit" , ["lead_id" => $row->id]).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                    return $btn;
                })->rawColumns(['action'])
                ->make(true);
        }
        $leads = Lead::get();
        return view('admin.lead.index', compact('leads'));

    }

   
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'name' => 'required|min:3|max:180',
            'email' => 'required|min:3|max:180',
            'phone' => 'required',
        ]);
        $data = $request->all();
        if($request->dob!="" || $request->dob!="0000-00-00")
        {
        $data['dob'] = date('Y-m-d', strtotime($request->dob));
        }
        $lead = Lead::create($data);
     
        return redirect()->route('lead.index')->with('success','Lead successfully Added!');;
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($leadId)
    {
        $users = User::get();
        $lead = Lead::where('id', $leadId)->first();
        $countries= Country::get(["name","id"]);
     
        return view('admin.lead.edit', compact('lead', 'users','countries'));
    }

    /**
     * @param Request $request
     * @param $userId
     * @return mixed
     */
    public function update(Request $request, $leadId)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:180',
            'email' => 'required|min:3|max:180',
            'phone' => 'required',
        ]);
         $data = $request->all();
         if($request->dob!="" || $request->dob!="0000-00-00")
        {
        $data['dob'] = date('Y-m-d', strtotime($request->dob));
        }
        $lead = Lead::where('id', $leadId)->first();
        $lead->update($data);
        return redirect()->back()->with('success','Information Updated successfully!');
    }



}
