<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserList extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showuser(){
        return 'user List';
    }

    public function logout () {
        //logout user
        Auth::logout();
        // redirect to homepage
        return redirect('/admin');
    }
}
