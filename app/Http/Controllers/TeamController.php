<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $page = 'team';
        $display = 'list';

        $contents = Team::all();
        //dd($leads);
        return view('admin.team',compact('contents','display','page'));
    }

    public function addteam(){
        $page = 'team';
        $display = 'add';
        return view('admin.team',compact('display','page'));
    }

    public function editteam($id){
        $display = 'edit';
        $page = 'team';

        $contents = Team::findOrFail($id);
        //   dd($contents);

        if(count($contents)>0){
            return view('admin.team',compact('contents', 'display','page'));
        }else{
            return redirect()->route('teamList');
        }

    }

    public function store(Request $request){
        // dd($request);
        $this->validate($request,[
            'team_name'=>'required'
        ]);
        $team_images = '';
        If($request->hasFile('team_images')){
            $file = $request->file('team_images');
            $destinationPath = public_path(). '/uploads/Teams';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $team_images =  'uploads/Teams/'.$filename;
            //echo '<img src="uploads/teams'. $filename . '"/>';
        }

        $team_data = new team([
            'team_name' => $request->get('team_name'),
            'team_images' => $team_images,
            'team_designation' => $request->get('team_designation'),
            'team_details' => $request->get('team_details'),
            'team_facebook' => $request->get('team_facebook'),
            'team_twitter' => $request->get('team_twitter'),
            'team_google_pluS' => $request->get('team_google_pluS'),
            'team_linkdin' => $request->get('team_linkdin'),
            'user_id' =>1
        ]);
        $team_data->save();


        //PUT HERE AFTER YOU SAVE
        $request->session()->flash('alert-success', 'team was successful added!');

        return redirect()->route('teamList');
    }


    public function update($id,Request $request){
        $data = Team::findOrFail($id);
        //dd($editleads);
        $display = 'list';
        $this->validate($request,[
            'team_name'=>'required',
        ]);

        If($request->hasFile('team_images')){
            $file = $request->file('team_images');
            $destinationPath = public_path(). '/uploads/Teams';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $team_image =  'uploads/Teams/'.$filename;
            //echo '<img src="uploads/teams'. $filename . '"/>';
        }else{
            $team_image = $request->get('team_old_url');
        }

        $data->team_name = $request->get('team_name');
        $data->team_designation = $request->get('team_designation');
        $data->team_details = $request->get('team_details');
        $data->team_facebook = $request->get('team_facebook');
        $data->team_twitter = $request->get('team_twitter');
        $data->team_google_pluS = $request->get('team_google_pluS');
        $data->team_linkdin = $request->get('team_linkdin');
        $data->team_images = $team_image;


        $data->save();


        //dd($leads);
        return redirect()->route('teamList');


    }

    public function delete(Request $request){
        // dd($request);
        $id = $request->get('id');
        $error = false;
        //$token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->get('_token');
        $msg = '';
        if($request->ajax())
        {
            if (Session::token() !== $request->header('X-CSRF-Token'))
            {
                $error = true;
                $msg = 'Token Mismatch';
            }
        }
        elseif (Session::token() !== $request->get('_token')){
            $error = true;
            $msg = 'Token Mismatch';
        }
        if(!$error){
            $pages = Team::find($id);
            $pages->delete();

        }

        return json_encode(array('msg'=> $msg,'error'=>$error,'id'=>$id));
        //return $id;

    }
}
