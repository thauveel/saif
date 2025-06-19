<?php
 
namespace App\Http\Livewire;

use App\Enum\Division;
use App\Enum\PlayerType;
use App\Enum\Sport;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use App\Models\Team as Teams;
use App\Models\Official;
use App\Models\Player;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;;

class Team extends Component
{
    use WithFileUploads; 

    public $tournament;

    public $current_team, $step = 0, $total_steps = 5;
    //team details
    public $name, $email, $division, $phone, $logo, $jersey_document;
    //player detail
    public $player_name, $jersey_number, $id_number, $verification_document;
    //official details
    public $official_name, $official_phone;
    //both player and offical fields
    public $type = null, $photo;


    public $players = [], $player;
    public $playerss = [];
    public $officials = [], $official;

    public $updated = false;


    public function save_team(){
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'email|required',
            'phone' => 'required|numeric',
            'division' => [$this->tournament->is_divisible?'required':'nullable' ,new Enum(Division::class)],
            'logo'  => 'image|required|max:10000|mimes:png,svg,jpg,jpeg,webp',
            'jersey_document'  => $this->tournament->jersey_document_required? 'required|file|max:50000|mimes:png,svg,jpg,pdf':'nullable|file|max:50000|mimes:png,svg,jpg,pdf'
        ]);

        try {
            $validatedData = array_merge($validatedData, ['tournament_id' => Tournament::first()->id, 'status' => 'draft']);
            
            $temp_logo = $this->logo->store('logo', 'public');
            if ($this->jersey_document){
                $temp_jersey_doc = $this->jersey_document->store('jersey_document', 'public');
            }else{
                $temp_jersey_doc = null;
            }
            
            $this->current_team = $this->tournament->teams()->create($validatedData);
            $this->current_team->logo = $temp_logo;
            $this->current_team->jersey_document = $temp_jersey_doc;
            if(!$this->tournament->is_divisible){
                $this->current_team->division = $this->tournament->division;
            }
            $this->current_team->save();
            $this->updated = true;
            $this->step++;
        } catch (\Exception $ex) {
            session()->flash('error',$ex);
        }
    }

    public function update_team(){
        $validatedData = $this->validate([
            'jersey_document'  => 'required|file|max:50000|mimes:png,svg,jpg,pdf' 
        ]);

        try {
            $validatedData = array_merge($validatedData, ['tournament_id' => Tournament::first()->id, 'status' => 'draft']);
            
            $temp_jersey_doc = $this->jersey_document->store('jersey_document', 'public');
            $this->current_team->jersey_document = $temp_jersey_doc;
            $this->current_team->save();
            $this->step++;
        } catch (\Exception $ex) {
            session()->flash('error',$ex);
        }
    }

    public function save_player(){
        $validatedData = $this->validate([
            'player_name' => 'required',
            'jersey_number' => 'numeric|required|min:1|max:'.$this->tournament->max_jersey_no,
            'id_number' => 'required',
            'photo'  => 'image|required|max:10000|mimes:png,svg,jpg',
            'verification_document'  => $this->tournament->verification_document_required? 'required|max:50000|mimes:png,svg,jpg,pdf':'nullable'
        ]);
        if ($this->photo){
            $temp_photo = $this->photo->store('photo', 'public');
        }else{
            $temp_photo = null;
        }
        
        if ($this->verification_document){
            $verification_document = $this->verification_document->store('verification_document', 'public');
        }else{
            $verification_document = null;
        }
        try {
            $player = $this->current_team->players()->create($validatedData);
            $player->photo = $temp_photo;
            $player->verification_document = $verification_document;
            if ($this->tournament->player_type_required && $this->type == null) {
                $player->type = PlayerType::REGULAR;
            }else{
                $player->type = $this->type;
            }
            $player->save();
            $this->players = $this->current_team->players()->get();;
            $this->resetFields();
        } catch (\Exception $ex) {
            session()->flash('error',$ex);
        }
    }

    public function select_player($id)
    {
        $this->player = Player::find($id);
        if ($this->player){
            $this->player_name = $this->player->player_name;
            $this->jersey_number = $this->player->jersey_number;
            $this->id_number = $this->player->id_number;
            $this->type = $this->player->type;
            $this->photo = null;
            $this->verification_document = null;
        } 
    }


    public function clear_selected_player()
    {
        $this->player = null;
        $this->resetFields();
    }
    public function update_player()
    {
        $this->tournament->verification_document_required&&$this->verification_document == null? dd('Verification document is required') : dd('Verification document is not required');
        $validatedData = $this->validate([
            'player_name' => 'required',
            'jersey_number' => 'numeric|required|min:1|max:'.$this->tournament->max_jersey_no,
            'id_number' => 'required',
            'photo'  => $this->photo == null?'nullable|image|max:10000|mimes:png,svg,jpg':'image|max:10000|mimes:png,svg,jpg',
            'verification_document'  => $this->tournament->verification_document_required&&$this->verification_document == null? 'required|max:50000|mimes:png,svg,jpg,pdf':'nullable'
        ]);

        if ($this->photo <> null){
            $temp_photo = $this->photo->store('photo', 'public');
            if (File::exists(public_path('storage/'.$this->player->photo))) {
                File::delete(public_path('storage/'.$this->player->photo));
            }
        }else{
            $temp_photo = $this->player->photo;
        }

        if ($this->verification_document <> null){
            $verification_document = $this->verification_document->store('verification_document', 'public');
            if (File::exists(public_path('storage/'.$this->player->verification_document))) {
                File::delete(public_path('storage/'.$this->player->verification_document));
            }
        }else{
            $verification_document = $this->player->verification_document;
        }

        try {
            
           
            $this->player->update($validatedData);
            $this->player->photo = $temp_photo;
            $this->player->verification_document = $verification_document;
            if ($this->tournament->player_type_required && $this->type == null) {
                $this->player->type = PlayerType::REGULAR;
            }else{
                $this->player->type = $this->type;
            }
            $this->player->save();
            $this->players =  Player::where('team_id',$this->current_team->id)->get();
            $this->resetFields();
            $this->clear_selected_player();
        } catch (\Exception $ex) {
            session()->flash('error',$ex);
        }
    }

    public function delete_player($id)
    {
        if ($this->player) {
            $this->clear_selected_player();
        }
        
        $player = Player::find($id);
        if (File::exists(public_path('storage/'.$player->photo))) {
            File::delete(public_path('storage/'.$player->photo));
        }
        $player->delete();
        $this->players =  Player::where('team_id',$this->current_team->id)->get();
    }

    public function save_official(){
        if ($this->current_team->status === 'participated') {
            session()->flash('error', 'You cannot add officials after the team has participated.');
            return;
        }
        $validatedData = $this->validate([
            'official_name' => 'required',
            'type' => 'required',
            'id_number' => 'required',
            'phone' => 'required',
            'photo'  => 'image|required|max:10000|mimes:png,svg,jpg'
        ]);

        if ($this->photo){
            $temp_photo = $this->photo->store('photo', 'public');
        }else{
            $temp_photo = null;
        }

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

    public function select_official($id)
    {
        $this->official = Official::find($id);
        if ($this->official){
            $this->official_name = $this->official->player_name;
            $this->jersey_number = $this->player->jersey_number;
            $this->id_number = $this->player->id_number;
            $this->phone = $this->player->phone;
            $this->photo = null;
            $this->verification_document = null;
        } 
    }

    public function delete_official($id)
    {
        if ($this->current_team->status !== 'participated')
        {
            $official = Official::find($id);
            if (File::exists(public_path('storage/'.$official->photo))) {
                File::delete(public_path('storage/'.$official->photo));
            }
            $official->delete();
            $this->officials =  Official::where('team_id',$this->current_team->id)->get();
        }   
    }

    public function mount(Request $request, Tournament $tournament)
    {
        
        if ($request->has('team')) 
        {
            
            $this->current_team = Teams::where('id', $request->team)->where('tournament_id', $tournament->id)->first();
            if (!$this->current_team){
                abort(404);
            }
            $this->name = $this->current_team->name;
            $this->email = $this->current_team->email;
            $this->division = $this->current_team->division;
            $this->phone = $this->current_team->phone;
            $this->logo = $this->current_team->logo;
            $this->jersey_document = $this->current_team->jersey_document;

            $this->players = [];
            $this->officials = [];
            $this->players =  Player::where('team_id',$this->current_team->id)->get();
            
            $this->officials = Official::where('team_id',$this->current_team->id)->get();

            $this->step = 0;

            

            if ($this->tournament->jersey_document_required == true && $this->current_team->jersey_document == null ) 
            {
                $this->updated = false;
               
            }else{
                $this->updated = true;
            }
            
            
        }

        $this->tournament = $tournament;
        
    }

    public function render()
    {
        
        switch ($this->step) {
            case null | 0: return view('livewire.team');
            case 1: return view('livewire.player');
            case 2: return view('livewire.official');
            case 3: return view('livewire.all');
            case 4: return view('livewire.tcdownloadble');
            case 5: return view('livewire.submitted');
        }
        
    }

    public function resetFields()
    {
        $this->player_name = '';
        $this->jersey_number = '';
        $this->id_number = '';
        $this->phone = null;
        $this->photo = null;
        $this->official_name = '';
        $this->type = null;
        $this->verification_document = null;

    }

    public function next_step()
    {
        $this->step++;
        $this->resetFields();
        $this->player= null;
        $this->official = null;
        $this->players =  Player::where('team_id',$this->current_team->id)->get();
        $this->officials = Official::where('team_id',$this->current_team->id)->get();
    }

    public function previous_step()
    {
        $this->step--;
        $this->resetFields();
        $this->player= null;
        $this->official = null;
        $this->players =  Player::where('team_id',$this->current_team->id)->get();
        $this->officials = Official::where('team_id',$this->current_team->id)->get();
    }

    public function set_step($step)
    {
        $this->step = $step;
        $this->resetFields();
        $this->player= null;
        $this->official = null;
        $this->players =  Player::where('team_id',$this->current_team->id)->get();
        $this->officials = Official::where('team_id',$this->current_team->id)->get();
    }

    public function agree()
    {
        $this->current_team->status = 'submitted';
        $this->current_team->save();
        $this->step++;
    }
}
