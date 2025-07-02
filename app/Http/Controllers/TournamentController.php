<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;
use App\Models\Tournament;

class TournamentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tournaments = Tournament::all();
        return view('dashboard', compact('tournaments'));
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
    public function store(StoreTournamentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        $tournament = $tournament->load(['teams', 'teams.players']);
        $teams = $tournament->teams()->paginate(5);
        return view('tournaments.dashboard', compact('teams', 'tournament'));
    }

    /**
     * Display the specified resource.
     */
    public function dashboard(Tournament $tournament)
    {
        
        return view('teams.show', compact('team',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTournamentRequest $request, Tournament $tournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
