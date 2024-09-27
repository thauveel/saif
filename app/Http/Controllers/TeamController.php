<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use App\Models\Tournament;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::paginate(5);
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament, Team $team)
    {
        $resubmitlink = $tournament->slug."/apply?team=".$team->id;
        return view('teams.show', compact('team','resubmitlink'));
    }

    /**
     * Display the specified resource.
     */
    public function print(Tournament $tournament, Team $team)
    {
        
        return view('teams.print', compact('team', 'tournament'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament, Team $team)
    {
        $team->players()->delete();
        $team->officials()->delete();
        $team->delete();

        return redirect(route('teams.index'));
    }
}
