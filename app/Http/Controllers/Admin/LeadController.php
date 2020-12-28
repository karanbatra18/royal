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
        $users = User::where('role_id',3)->get();
        
        $countries= Country::get(["name","id"]);
        return view('admin.lead.create',compact('users','countries'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
      public function index(Request $request)
    {
        $role_id=auth()->user()->role_id;
          $user_id= auth()->user()->id ;
             $datas['from_date']=""; 
             $datas['to_date']=""; 
        if($role_id==1){
            if ($request->ajax()) {
                 if($request->from_date!="" && $request->from_date!="1970-01-01")
        {
            $datas['from_date'] = date('Y-m-d', strtotime($request->from_date));
        }
         if($request->to_date!="" && $request->to_date!="1970-01-01")
        {
            $datas['to_date'] = date('Y-m-d', strtotime($request->to_date));
        }
         if($datas['from_date'] !="" && $datas['to_date'] !=""){
         $data = Lead::where([['created_at', '>=', $datas['from_date']],['created_at', '<=', $datas['to_date']]])->latest()->get();
         }else{ 
                $data = Lead::latest()->get();
         }
                return Datatables::of($data)
                   ->addColumn('action', function($row){
                        $btn = '<a href="'.route("lead.edit" , ["lead_id" => $row->id]).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                        return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
            }
            $leads = Lead::get();
            return view('admin.lead.index', compact('leads'));
        }else{
            if ($request->ajax()) {
               $data = Lead::where('assign_user',$user_id)->latest()->get();
                return Datatables::of($data)
                   ->addColumn('action', function($row){
                        $btn = '<a href="'.route("lead.edit" , ["lead_id" => $row->id]).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                        return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
            }
            $leads = Lead::where('assign_user',$user_id)->get();
            return view('admin.lead.index', compact('leads')); 
        }

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
          $users = User::where('role_id',3)->get();
     
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

      public function search(Request $request)
    {
        $role_id=auth()->user()->role_id;
          $user_id= auth()->user()->id ;
           if($request->from_date!="" || $request->from_date!="0000-00-00")
        {
            $datas['from_date'] = date('Y-m-d', strtotime($request->from_date));
        }
         if($request->to_date!="" || $request->to_date!="0000-00-00")
        {
            $datas['to_date'] = date('Y-m-d', strtotime($request->to_date));
        }
              
        if($role_id==1){
            if ($request->ajax()) {
                $data = Lead::where([['created_at', '>=', $datas['from_date']],['created_at', '<=', $datas['to_date']]])->latest()->get();
                return Datatables::of($data)
                   ->addColumn('action', function($row){
                        $btn = '<a href="'.route("lead.edit" , ["lead_id" => $row->id]).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                        return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
            }
            $leads = Lead::get();
            return view('admin.lead.index', compact('leads'));
        }else{
            if ($request->ajax()) {
               $data = Lead::where('assign_user',$user_id)->latest()->get();
                return Datatables::of($data)
                   ->addColumn('action', function($row){
                        $btn = '<a href="'.route("lead.edit" , ["lead_id" => $row->id]).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                        return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
            }
            $leads = Lead::where('assign_user',$user_id)->get();
            return view('admin.lead.index', compact('leads')); 
        }

    }



}
