<?php

namespace App\Http\Controllers;

use App\Enum\TournamentStatus;
use App\Models\Tournament;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $tournaments = Tournament::where('status' , '!=', 'draft')->latest()->get();
        return view('home', compact('tournaments'));
    }

    public function livescore(){
        return 'livescore';
        //te
    }

    public function create(Tournament $tournament){
        if($tournament->status == TournamentStatus::Open)
        {
            return view('application', compact('tournament'));
        }
        else{
            abort(404);
        }
        
    }
}
