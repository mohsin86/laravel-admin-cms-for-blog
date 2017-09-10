<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageOptionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

}
