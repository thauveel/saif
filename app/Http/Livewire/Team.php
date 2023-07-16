<?php
 
namespace App\Http\Livewire;
 
use Livewire\Component;
use App\Models\Team as Teams;
use App\Models\Official as Officials;
use App\Models\Player as Players;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use File;

class Team extends Component
{
    use WithFileUploads; 

    public $current_team, $step = 4, $total_steps = 5;
    //team details
    public $name, $email, $phone, $logo;
    //player detail
    public $player_name, $jersey_number, $id_number, $photo, $is_libero = false;
    //official details
    public $official_name, $official_type;


    public $players = [], $player;
    public $playerss = [];
    public $officials = [], $official;

    public function save_team(){
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'email|required',
            'phone' => 'required|numeric',
            'logo'  => 'image|required|max:10000|mimes:png,svg,jpg,jpeg,webp'
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
            $this->players = $this->current_team->players()->get();;
            $this->resetFields();
        } catch (\Exception $ex) {
            session()->flash('error',$ex);
        }
    }

    public function delete_player($id)
    {
        //$this->player = $id;
        $player = Players::find($id);
        if (File::exists(public_path('storage/'.$player->photo))) {
            File::delete(public_path('storage/'.$player->photo));
        }
        $player->delete();
        $this->players =  Players::where('team_id',$this->current_team->id)->get();
    }

    public function save_official(){
        $validatedData = $this->validate([
            'official_name' => 'required',
            'official_type' => 'required',
            'id_number' => 'required',
            'phone' => 'required',
            'photo'  => 'image|required|max:10000|mimes:png,svg,jpg'
        ]);
        $temp_photo = $this->photo->store('photo', 'public');

        try {
            $official = $this->current_team->officials()->create($validatedData);
            $official->photo = $temp_photo;
            $official->save();
            $this->officials = $this->current_team->officials()->get();
            $this->resetFields();
        } catch (\Exception $ex) {
            session()->flash('error',$ex);
        }
    }

    public function delete_official($id)
    {
        $official = Officials::find($id);
        if (File::exists(public_path('storage/'.$official->photo))) {
            File::delete(public_path('storage/'.$official->photo));
        }
        $official->delete();
        $this->officials =  Officials::where('team_id',$this->current_team->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function mount(Request $request)
    {
        if ($request->has('team')) 
        {
            $this->current_team = Teams::find($request->team);
            if (!$this->current_team){
                abort(404);
            }
            $this->players = [];
            $this->officials = [];
            $this->players =  Players::where('team_id',$this->current_team->id)->get();
            
            $this->officials = Officials::where('team_id',$this->current_team->id)->get();
            // if (count($this->current_team->players()->get()) < 5 )
            // {
            //     $this->step= 1;
            // }else
            // {
            //     if (count($this->current_team->officials()->get()) < 3 ){
            //         $this->step=2;
            //     }
                
            // }

            $this->step = 0;
            
            
        }
        
    }

    public function render()
    {
        switch ($this->step) {
            case null | 0: return view('livewire.team');
            case 1: return view('livewire.player');
            case 2: return view('livewire.official');
            case 3: return view('livewire.all');
            case 4: return view('livewire.tc');
            case 5: return view('livewire.submitted');
        }
        
    }

    public function resetFields()
    {
        $this->player_name = '';
        $this->jersey_number = '';
        $this->id_number = '';
        $this->phone = '';
        $this->photo = null;
        $this->is_libero = false;
        $this->official_name = '';
        $this->official_type = '';

    }

    public function next_step()
    {
        $this->step++;
        $this->players =  Players::where('team_id',$this->current_team->id)->get();
        $this->officials = Officials::where('team_id',$this->current_team->id)->get();
    }

    public function previous_step()
    {
        $this->step--;
        $this->players =  Players::where('team_id',$this->current_team->id)->get();
        $this->officials = Officials::where('team_id',$this->current_team->id)->get();
    }

    public function set_step($step)
    {
        $this->step = $step;
        $this->players =  Players::where('team_id',$this->current_team->id)->get();
        $this->officials = Officials::where('team_id',$this->current_team->id)->get();
    }

    public function agree()
    {
        $this->current_team->status = 'submitted';
        $this->current_team->save();
        $this->step++;
    }
}
