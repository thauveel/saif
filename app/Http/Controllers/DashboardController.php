<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;
use App\Models\Official;

class DashboardController extends Controller
{
    public function index(){
        $teams = Team::all()->count();
        $players = Player::all()->count();
        $officials = Official::all()->count();
        return view('dashboard', compact('teams','players','officials'));
    }
}
