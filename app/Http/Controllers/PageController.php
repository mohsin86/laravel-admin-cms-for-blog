<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\PageOptions;
use Illuminate\Support\Facades\Session;
class PageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $display = 'list';
        $page = 'page';
        $contents = Page::all();
        return view('admin.page',compact('contents','display','page'));
    }

    public function addpage()
    {
        $display = 'add';
        $page = 'page';

        return view('admin.page',compact('display','page'));
    }

    public function editpage($id)
    {
        $display = 'edit';
        $page = 'page';
        $contents = Page::findOrFail($id);
        $page_options = PageOptions::where('page_id',$id)->orderBy('id', 'ASC')->get();

      //  dd($page_options);
        if(count($page_options)<0){
            $page_options = [];
        }


        return view('admin.page',compact('contents','page_options','display','page'));
    }

    public function store(Request $request){
        $messages = [
            "page_title.required" => "Title is required",
            "page_body.required" => "Body is required",
        ];


        $this->validate($request,[
            'page_title'=>'required',
            'page_body'=>'required',
        ], $messages);



        $page_featured_image = '';
        If($request->hasFile('page_featured_image')){
            $file = $request->file('page_featured_image');
            $destinationPath = public_path(). '/uploads/Page';
            //Check if the directory already exists.
            if(!is_dir($destinationPath)){
                //Directory does not exist, so lets create it.
                mkdir($destinationPath, 0755, true);
            }
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $page_featured_image =  'uploads/Page/'.$filename;
            //echo '<img src="uploads/Leads'. $filename . '"/>';
        }

        $page_data = new Page([
            'page_title' => $request->get('page_title'),
            'page_slug' =>PageController::clean($request->get('page_title')) ,
            'page_subtitle' => $request->get('page_subtitle'),
            'page_body' => $request->get('page_body'),
            'page_featured_image' => $page_featured_image,
            'user_id' => 1,
        ]);




        $page_data->save();

        $last_insert_id = $page_data->id;

        $page_options_title = $request->get('page_options_title');
        $page_options_body = $request->get('page_options_body');
        $options = [];
        if(!empty($page_options_title)){
            $i = 0;
            foreach ($page_options_title as $title){

                $options[$i]['page_options_title'] = $title;
                if($title==''){
                    $slug=  PageController::clean($request->get('page_title').'options'.$i);
                }else{
                    $slug = PageController::clean($title);
                }
                $options[$i]['page_options_slug'] = $slug;
                $i++;
            }
        }
        if(!empty($page_options_body)){
            $i = 0;
            foreach ($page_options_body as $body){
                $options[$i++]['page_options_body'] = $body;
            }
        }

        if(!empty($options)){
            foreach ($options as $opt){
                //PageOptions
                $page_opt_data = new PageOptions([
                    'page_options_title' => $opt['page_options_title'],
                    'page_options_slug' =>$opt['page_options_slug'],
                    'page_options_body' => $opt['page_options_body'],
                    'page_id' => $last_insert_id
                ]);
                $page_opt_data->save();
            }
        }

      //  dd($options);
        //PUT HERE AFTER YOU SAVE
        $request->session()->flash('alert-success', 'Page was successful added!');
        return redirect()->route('pageList');
    }

    public function update($id,Request $request){
        $data = Page::findOrFail($id);
        //dd($editleads);

        $this->validate($request,[
            'page_title'=>'required',
            'page_body'=>'required',
        ]);

        If($request->hasFile('page_featured_image')){
            $file = $request->file('page_featured_image');
            $destinationPath = public_path(). '/uploads/Page';
            //Check if the directory already exists.
            if(!is_dir($destinationPath)){
                //Directory does not exist, so lets create it.
                mkdir($destinationPath, 0755, true);
            }
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $page_featured_image =  'uploads/Page/'.$filename;
            //echo '<img src="uploads/Leads'. $filename . '"/>';
        }else{
            $page_featured_image = $request->get('page_old_url');
        }

        $data->page_title = $request->get('page_title');
        $data->page_subtitle = $request->get('page_subtitle');
        $data->page_body = $request->get('page_body');
        $data->page_featured_image = $page_featured_image;


        // save
        $data->save();


        $page_options_title = $request->get('page_options_title');
        $page_options_body = $request->get('page_options_body');
        $page_options_id = $request->get('page_options_id');

        $options = [];

        if(count($page_options_title)>0){
            $i = 0;
            foreach ($page_options_title as $title){

                $options[$i]['page_options_title'] = $title;
                if($title==''){
                    $slug=  PageController::clean($request->get('page_title').'options'.$i);
                }else{
                    $slug = PageController::clean($title);
                }
                $options[$i]['page_options_slug'] = $slug;
                $i++;
            }
        }
        if(count($page_options_body)>0){
            $i = 0;
            foreach ($page_options_body as $body){
                $options[$i++]['page_options_body'] = $body;
            }
        }
        if(count($page_options_id)>0){
            $i = 0;
            foreach ($page_options_id as $opt_id){
                $options[$i++]['id'] = $opt_id;
            }
        }

       // dd($options);
        if(count($options)>0){
            foreach ($options as $opt){
                //PageOptions
                if (array_key_exists("id",$opt)){
                    $data_opt = PageOptions::findOrFail($opt['id']);
                    $data_opt->page_options_title =  $opt['page_options_title'];
                    $data_opt->page_options_body = $opt['page_options_body'];
                    $data_opt->save();

                }else{

                    $page_opt_data = new PageOptions([
                        'page_options_title' => $opt['page_options_title'],
                        'page_options_slug' =>$opt['page_options_slug'],
                        'page_options_body' => $opt['page_options_body'],
                        'page_id' => $id
                    ]);
                     $page_opt_data->save();
                }

            }
        }
        //dd($leads);
        $request->session()->flash('alert-success', 'Page was successful updatedd!');
        return redirect()->route('pageList');
    }

    public function delete(Request $request){
       // dd($request);
        $id = $request->get('id');
        $error = false;
        //$token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->get('_token');
        $msg = '';
        if($request->ajax()){

            if (Session::token() !== $request->header('X-CSRF-Token')){
                $error = true;
                $msg = 'Token Mismatch';
            }
        }elseif (Session::token() !== $request->get('_token')){

            $error = true;
            $msg = 'Token Mismatch';
        }

        if(!$error){
            $pages = Page::find($id);
            $pages->delete();
        }

        return json_encode(array('msg'=> $msg,'error'=>$error,'id'=>$id));
        //return $id;
    }
    public function deletepageoptions(Request $request){
        $id = $request->get('id');
        $error = false;
        //$token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->get('_token');
        $msg = '';
        if($request->ajax()){

            if (Session::token() !== $request->header('X-CSRF-Token'))
            {
                $error = true;
                $msg = 'Token Mismatch';
            }
        }elseif (Session::token() !== $request->get('_token')){
            $error = true;
            $msg = 'Token Mismatch';
        }

        if(!$error){
            $pages = PageOptions::find($id);
            $pages->delete();
        }

        return json_encode(array('msg'=> $msg,'error'=>$error,'id'=>$id));
    }

    public function clean($string) {
        $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string = preg_replace('/[0-9]+/', '', $string); // remove numbers from beginning of a line
        $string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
        return strtolower($string);
    }
}
