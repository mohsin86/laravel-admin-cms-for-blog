<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
        $all_options = Settings::all();
        $contents = [];
        foreach ($all_options as $opt){
            $contents[$opt->settings_name] = $opt->settings_value;
        }

        return view('admin.settings',compact('contents'));
    }
}
