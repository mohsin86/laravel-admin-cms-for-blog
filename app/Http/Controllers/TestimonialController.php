<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $page = 'testimonial';
        $display = 'list';

        $contents = Testimonial::all();
        //dd($leads);
        return view('admin.testimonial',compact('contents','display','page'));
    }

    public function addtestimonial(){
        $page = 'testimonial';
        $display = 'add';
        return view('admin.testimonial',compact('display','page'));
    }

    public function edittestimonial($id){
        $display = 'edit';
        $page = 'testimonial';

        $contents = Testimonial::findOrFail($id);
      //   dd($contents);

        if(count($contents)>0){
            return view('admin.testimonial',compact('contents', 'display','page'));
        }else{
            return redirect()->route('testimonialList');
        }

    }

    public function store(Request $request){
        // dd($request);
        $this->validate($request,[
            'testimonial_name'=>'required',
            'testimonial_desc'=>'required'
        ]);
        $testimonial_image = '';
        If($request->hasFile('testimonial_images')){
            $file = $request->file('testimonial_images');
            $destinationPath = public_path(). '/uploads/testimonials';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $testimonial_images =  'uploads/testimonials/'.$filename;
            //echo '<img src="uploads/testimonials'. $filename . '"/>';
        }

        $testimonial_data = new Testimonial([
            'testimonial_name' => $request->get('testimonial_name'),
            'testimonial_images' => $testimonial_images,
            'testimonial_companies' => $request->get('testimonial_companies'),
            'testimonial_country' => $request->get('testimonial_country'),
            'testimonial_desc' => $request->get('testimonial_desc'),
            'testimonial_facebook' => $request->get('testimonial_facebook'),
            'testimonial_twitter' => $request->get('testimonial_twitter'),
            'testimonial_google_pluS' => $request->get('testimonial_google_pluS'),
            'testimonial_extra' => $request->get('testimonial_extra'),
            'user_id' =>1
        ]);
        $testimonial_data->save();


        //PUT HERE AFTER YOU SAVE
        $request->session()->flash('alert-success', 'testimonial was successful added!');

        return redirect()->route('testimonialList');
    }


    public function update($id,Request $request){
        $data = Testimonial::findOrFail($id);
        //dd($editleads);
        $display = 'list';
        $this->validate($request,[
            'testimonial_name'=>'required',
            'testimonial_desc'=>'required',
        ]);

        If($request->hasFile('testimonial_images')){
            $file = $request->file('testimonial_images');
            $destinationPath = public_path(). '/uploads/testimonials';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $testimonial_image =  'uploads/testimonials/'.$filename;
            //echo '<img src="uploads/testimonials'. $filename . '"/>';
        }else{
            $testimonial_image = $request->get('testimonial_old_url');
        }

        $data->testimonial_name = $request->get('testimonial_name');
        $data->testimonial_companies = $request->get('testimonial_companies');
        $data->testimonial_country = $request->get('testimonial_country');
        $data->testimonial_desc = $request->get('testimonial_desc');
        $data->testimonial_facebook = $request->get('testimonial_facebook');
        $data->testimonial_twitter = $request->get('testimonial_twitter');
        $data->testimonial_google_pluS = $request->get('testimonial_google_pluS');
        $data->testimonial_extra = $request->get('testimonial_extra');


        $data->testimonial_images = $testimonial_image;


        $data->save();


        //dd($leads);
        return redirect()->route('testimonialList');


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
            $pages = Testimonial::find($id);
            $pages->delete();

        }

        return json_encode(array('msg'=> $msg,'error'=>$error,'id'=>$id));
        //return $id;

    }
}
