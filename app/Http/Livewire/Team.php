<?php
 
namespace App\Http\Livewire;
 
use Livewire\Component;
use App\Models\Team as Teams;
use App\Models\Player as Players;
use Livewire\WithFileUploads;

class Team extends Component
{
    use WithFileUploads; 

    public $current_team, $step;
    //team details
    public $name, $email, $phone, $logo;
    //player detail
    public $player_name, $jersey_number, $id_number, $photo, $is_libero = false;
    //official details
    public $official_name, $official_type;


    public $players = [];
    public $officials = [];

    public function save_team(){
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'email|required',
            'phone' => 'required|numeric',
            'logo'  => 'image|required|max:10000|mimes:png,svg,jpg'
        ]);

        try {
            $temp_logo = $this->logo->store('logo', 'public');
            $this->current_team = Teams::create($validatedData);
            $this->current_team->logo = $temp_logo;
            $this->current_team->save();
            $this->step++;
        } catch (\Exception $ex) {
            session()->flash('error',$ex);
        }
    }

    public function save_player(){
        $validatedData = $this->validate([
            'player_name' => 'required',
            'jersey_number' => 'numeric|required|min:1|max:21',
            'id_number' => 'required',
            'is_libero' => 'boolean',
            'photo'  => 'image|required|max:10000|mimes:png,svg,jpg'
        ]);
        $temp_photo = $this->photo->store('photo', 'public');

        try {
            $player = $this->current_team->players()->create($validatedData);
            $player->photo = $temp_photo;
            $player->save();
            $this->players[] = $player;
            $this->resetFields();
        } catch (\Exception $ex) {
            session()->flash('error',$ex);
        }
    }

    public function save_official(){
        $validatedData = $this->validate([
            'official_name' => 'required',
            'official_type' => 'required',
            'id_number' => 'required',
            'photo'  => 'image|required|max:10000|mimes:png,svg,jpg'
        ]);
        $temp_photo = $this->photo->store('photo', 'public');

        try {
            $official = $this->current_team->officials()->create($validatedData);
            $official->photo = $temp_photo;
            $official->save();
            $this->officials[] = $official;
            $this->resetFields();
        } catch (\Exception $ex) {
            session()->flash('error',$ex);
        }
    }


    public function render()
    {
        switch ($this->step) {
            case null | 0: return view('livewire.team');
            case 1: return view('livewire.player');
            case 2: return view('livewire.official');
        }
        
    }

    public function resetFields()
    {
        $this->player_name = '';
        $this->jersey_number = '';
        $this->id_number = '';
        $this->photo = null;
        $this->is_libero = false;
        $this->official_name = '';
        $this->official_type = '';

    }

    public function next_step()
    {
        $this->step++;
    }
}
