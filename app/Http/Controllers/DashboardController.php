<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;
use App\Models\Official;
use App\Models\Tournament;

class DashboardController extends Controller
{
    public function index(){
        $tournaments = Tournament::all();
        return view('dashboard', compact('tournaments'));
    }
}
