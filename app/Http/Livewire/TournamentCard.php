<?php

namespace App\Http\Livewire;

use App\Models\Tournament;
use Livewire\Component;

class TournamentCard extends Component
{
    public $tournament;
    public function render()
    {
        return view('livewire.tournament-card');
    }

    public function mount(Tournament $tournament){
        $this->tournament = $tournament;
    }
}
