<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('home');
    }

    public function livescore(){
        return 'livescore';
        //te
    }

    public function apply(){
        return view('application');
    }
}
