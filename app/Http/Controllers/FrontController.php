<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $tournaments = Tournament::where('status' , '!=', 'draft')->get();
        return view('home', compact('tournaments'));
    }

    public function livescore(){
        return 'livescore';
        //te
    }

    public function create(Tournament $tournament){
        if($tournament->status == 'open')
        {
            return view('application', compact('tournament'));
        }
        else{
            abort(404);
        }
        
    }
}
