<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $page = 'client';
        $display = 'list';

        $contents = Client::all();
        //dd($leads);
        return view('admin.client',compact('contents','display','page'));
    }

    public function addclient(){
        $page = 'client';
        $display = 'add';
        return view('admin.client',compact('display','page'));
    }

    public function editclient($id){
        $display = 'edit';
        $page = 'client';

        $contents = Client::findOrFail($id);
        //  dd($editclients);

        if(!empty($contents)){
            return view('admin.client',compact('contents', 'display','page'));
        }else{
            return redirect()->route('clientList');
        }

    }

    public function store(Request $request){
        // dd($request);
        $this->validate($request,[
            'client_title'=>'required',
            'client_image'=>'required',
        ]);
        $client_image = '';
        If($request->hasFile('client_image')){
            $file = $request->file('client_image');
            $destinationPath = public_path(). '/uploads/Clients';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $client_image =  'uploads/Clients/'.$filename;
            //echo '<img src="uploads/Clients'. $filename . '"/>';
        }

        $client_data = new Client([
            'client_title' => $request->get('client_title'),
            'client_image' => $client_image,
            'user_id' => 1,
        ]);



        //PUT HERE AFTER YOU SAVE
        $request->session()->flash('alert-success', 'Client was successful added!');
        $client_data->save();
        return redirect()->route('clientList');
    }


    public function update($id,Request $request){
        $data = Client::findOrFail($id);
        //dd($editleads);
        $display = 'list';
        $this->validate($request,[
            'client_title'=>'required',
            'client_image'=>'required',
        ]);

        If($request->hasFile('client_image')){
            $file = $request->file('client_image');
            $destinationPath = public_path(). '/uploads/Clients';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $client_image =  'uploads/Clients/'.$filename;
            //echo '<img src="uploads/Clients'. $filename . '"/>';
        }else{
            $client_image = $request->get('client_old_url');
        }

        $data->client_title = $request->get('client_title');

        $data->client_image = $client_image;


        $data->save();


        //dd($leads);
        return redirect()->route('clientList');


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
            $pages = Client::find($id);
            $pages->delete();

        }

        return json_encode(array('msg'=> $msg,'error'=>$error,'id'=>$id));
        //return $id;

    }
}
