<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lead;
class LeadController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $page = 'dashboard';
        $display = 'list';

        $leads = Lead::all();
       //dd($leads);
        return view('admin.index',compact('leads','display','page'));
    }

    public function addForm(){
        $page = 'dashboard';
        $display = 'add';
        return view('admin.index',compact('display','page'));
    }

    public function store(Request $request){
       // dd($request);
         $this->validate($request,[
            'first_name'=>'required',
            'email'=>'required',
        ]);
        $profile_image = '';
        If($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $destinationPath = public_path(). '/uploads/Leads';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $profile_image =  'uploads/Leads/'.$filename;
            //echo '<img src="uploads/Leads'. $filename . '"/>';
        }

        $lead_data = new Lead([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'profile_url' => $request->get('profile_url'),
            'profile_image' => $profile_image,
            'company_name' => $request->get('company_name'),
            'company_url' => $request->get('company_url'),
            'designation' => $request->get('designation'),
            'extra_info' => $request->get('extra_info'),
            'valid' => $request->get('valid'),
            'source' => $request->get('source'),
            'user_id' => 1,
        ]);



        //PUT HERE AFTER YOU SAVE
        $request->session()->flash('alert-success', 'Lead was successful added!');
        $lead_data->save();
        return redirect()->route('admin.index');
    }

    public function editForm($id){
        $display = 'edit';
        $page = 'dashboard';

        $editleads = Lead::findOrFail($id);
      //  dd($editleads);

        if(!empty($editleads)){
            return view('admin.index',compact('editleads', 'display','page'));
        }else{
            return redirect()->route('admin.index');
        }

    }
    public function update($id,Request $request){
        $data = Lead::findOrFail($id);
        //dd($editleads);
        $display = 'list';
        $this->validate($request,[
            'first_name'=>'required',
            'email'=>'required',
        ]);

        If($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $destinationPath = public_path(). '/uploads/Leads';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $profile_image =  'uploads/Leads/'.$filename;
            //echo '<img src="uploads/Leads'. $filename . '"/>';
        }else{
            $profile_image = $request->get('profile_old_url');
        }

           $data->first_name = $request->get('first_name');
           $data->last_name = $request->get('last_name');
           $data->email = $request->get('email');
           $data->profile_url = $request->get('profile_url');
           $data->profile_image = $profile_image;
           $data->company_name = $request->get('company_name');
           $data->company_url = $request->get('company_url');
           $data->designation = $request->get('designation');
           $data->extra_info = $request->get('extra_info');
           $data->valid = $request->get('valid');
           $data->source = $request->get('source');

        $data->save();


        //dd($leads);
        return redirect('admin');


    }

    public function delete(){

    }
}
