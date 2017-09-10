<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pricing;
use App\PricingFeatures ;
use Illuminate\Support\Facades\Session;

class PricingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $display = 'list';
        $page = 'pricing';
        $contents = Pricing::all();
        return view('admin.pricing',compact('contents','display','page'));
    }

    public function addpricing()
    {
        $display = 'add';
        $page = 'pricing';

        return view('admin.pricing',compact('display','page'));
    }

    public function editpricing($id)
    {
        $display = 'edit';
        $page = 'pricing';
        $contents = Pricing::findOrFail($id);
        $pricing_features = PricingFeatures::where('pricing_id',$id)->orderBy('id', 'ASC')->get();
        //  dd($page_options);
        if(count($pricing_features)<0){
            $pricing_features = [];
        }
        return view('admin.pricing',compact('contents','pricing_features','display','page'));


    }

    public function store(Request $request){
        $messages = [
            "pricing_title.required" => "Title is required",
        ];


        $this->validate($request,[
            'pricing_title'=>'required'
        ], $messages);





        $pricing_data = new Pricing([
            'pricing_title' => $request->get('pricing_title'),
            'pricing_core_features' => $request->get('pricing_core_features'),
            'user_id' => 1,
        ]);



        //PUT HERE AFTER YOU SAVE
       //
        $pricing_data->save();

        $last_insert_id = $pricing_data->id;
        $pricing_additional_feature_title = $request->get('pricing_additional_feature_title');
        $options = [];
        if(!empty($pricing_additional_feature_title)){
            $i = 0;
            foreach ($pricing_additional_feature_title as $title){

                $options[$i]['pricing_additional_feature_title'] = $title;
                $i++;
            }
        }
        if(!empty($options)){
            foreach ($options as $opt){
                //PageOptions
                $feature_title = $opt['pricing_additional_feature_title'];
                if($feature_title):
                    $featue_data = new PricingFeatures([
                        'pricing_additional_feature_title' =>$feature_title ,
                        'pricing_id' =>$last_insert_id
                    ]);
                    $featue_data->save();
                endif;
            }
        }


       //dd($options);
        $request->session()->flash('alert-success', 'Pricing was successful added!');
         return redirect()->route('pricinglist');
    }

    public function update($id,Request $request){
        $data = Pricing::findOrFail($id);
        //dd($editleads);

        $this->validate($request,[
            'pricing_title'=>'required',
        ]);


        $data->pricing_title = $request->get('pricing_title');
        $data->pricing_core_features = $request->get('pricing_core_features');
        $data->save();



        $additional_feature = $request->get('pricing_additional_feature_title');
        $pricing_features_id = $request->get('pricing_featuress_id');

        $options = [];
        if(count($additional_feature)>0){
            $i = 0;
            foreach ($additional_feature as $title){
                $options[$i++]['pricing_additional_feature_title'] = $title;
            }
        }

        if(count($pricing_features_id)>0){
            $i = 0;
            foreach ($pricing_features_id as $ftr_id){
                $options[$i++]['id'] = $ftr_id;
            }
        }

    //    dd($options);
        if(count($options)>0){
            foreach ($options as $opt){
                //PageOptions
                $feature_title = $opt['pricing_additional_feature_title'];
                if($feature_title):
                    if (array_key_exists("id",$opt)){
                        $data_opt = PricingFeatures::findOrFail($opt['id']);
                            $data_opt->pricing_additional_feature_title = $opt['pricing_additional_feature_title'];
                            $data_opt->save();


                    }else{

                        $page_opt_data = new PricingFeatures([
                            'pricing_additional_feature_title' => $opt['pricing_additional_feature_title'],
                            'pricing_id' => $id
                        ]);
                        $page_opt_data->save();
                    }
                endif;

            }
        }
        //dd($leads);
        $request->session()->flash('alert-success', $request->get('pricing_title').' was successful updated!');
        return redirect()->route('pricinglist');


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
            $pages = Pricing::find($id);
            $pages->delete();

        }


        return json_encode(array('msg'=> $msg,'error'=>$error,'id'=>$id));
        //return $id;

    }
     public function deletePrisingFeature(Request $request){
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
             $pages = PricingFeatures::find($id);
             $pages->delete();
         }

         return json_encode(array('msg'=> $msg,'error'=>$error,'id'=>$id));
     }
}
