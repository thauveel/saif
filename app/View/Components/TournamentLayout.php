<?php

namespace App\View\Components;

use App\Models\Tournament;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TournamentLayout extends Component
{

    public Tournament $tournament;
    /**
     * Create a new component instance.
     */
    public function __construct(Tournament|string $tournament)
    {
       
        $this->tournament = $tournament instanceof Tournament
            ? $tournament
            : Tournament::where('slug', $tournament)->firstOrFail();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $tournament = $this->tournament;
        return view('layouts.tournament', compact('tournament'));
    }
}
