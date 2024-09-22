<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class TeamCardSmall extends Component
{
    public $team;
    public function render()
    {
        $team = $this->team;
        return view('livewire.team-card-small', compact('team'));
    }

    public function mount(Team $team)
    {
        $this->team = $team;
    }
}
