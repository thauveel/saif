<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <a href="/">
            @if($tournament->logo)
            <img src="{{ $tournament->logo }}" class="mt-10 h-20 w-auto fill-current text-gray-500" />
            @else
            <img src="/logo.png" class="mt-10 h-20 w-auto fill-current text-gray-500" />
            @endif
        </a>
        
    </div>
    <h2 class="my-4 text-2xl font-bold text-blue-950 md:text-3xl">{{ $tournament->name }}</h2>
    <header>
        <div class="max-w-7xl mx-auto py-6 px-10 sm:px-6 lg:px-8">
            <nav aria-label="Progress">
                <ol role="list" class="flex items-center">
                @for($i = 0; $i < $total_steps; $i++)
                        
                        
                        @if ($i !== $total_steps-1)
                            <li class="relative pr-8 sm:pr-20">
                        @else
                            <li class="relative">
                        @endif
                        
                        
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="h-0.5 w-full bg-gray-200"></div>
                            </div>
                        @if ($i == $step)
                        
                        <!-- Current Step -->
                        
                        <a class="relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-indigo-600 bg-white" aria-current="step">
                            <span class="h-2.5 w-2.5 rounded-full bg-indigo-600" aria-hidden="true"></span>
                        </a>
                        @elseif ($i > $step) 
                        <!-- Upcoming Step -->
                        <a class="group relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-300 bg-white hover:border-gray-400">
                            <span class="h-2.5 w-2.5 rounded-full bg-transparent group-hover:bg-gray-300" aria-hidden="true"></span>
                        </a>
                        @else
                        <!-- Current Step -->
                        <a wire:click.prevent="set_step({{$i}})" class="relative flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 hover:bg-indigo-900">
                            <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        @endif
                        </li>
                    @endfor
                
                </ol>
            </nav>
        </div>
    </header>
    <div class="w-full sm:max-w-4xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <livewire:team-card-small :team="$current_team"/>
    @if ($current_team->status <> 'participated')
        @if (count($players) < $tournament->max_players || $player <> null)
             
        <form wire:submit.prevent="submit">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            <!-- Player Name -->
            <div>
                <x-input-label for="player_name" :value="__('Player Name')" />
                <x-text-input wire:model.lazy="player_name" id="player_name" class="block mt-1 w-full" type="text" :value="old('player_name')" required autofocus autocomplete="player_name" />
                <x-input-error :messages="$errors->get('player_name')" class="mt-2" />
            </div>

            <!-- Jersey Number -->
            <div class="mt-4">
            
                <x-input-label for="jersey_number" :value="__('Jersey Number')" />
                <x-text-input wire:model.lazy="jersey_number" id="jersey_number" class="block mt-1 w-full" type="number" min="1" max="{{ $tournament->max_jersey_no}}" :value="old('jersey_number')" required autocomplete="jersey_number" />
                <x-input-error :messages="$errors->get('jersey_number')" class="mt-2" />
            </div>
            @if($tournament->player_type_required)
            <!-- Type -->
            <div class="mt-4">
                <x-input-label for="type" :value="__('Position')" />
                <select wire:model.lazy="type" id="type" name="player_type" autocomplete="type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                    @foreach(\App\Enum\PlayerType::forSport($tournament->sport->value) as $type)
                        <option value="{{ $type->value }}">{{ $type->label() }}</option>
                    @endforeach
                  </select>
                  <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>
            @endif

            <!-- ID/PP Number -->
            <div class="mt-4">
                <x-input-label for="id_number" :value="__('ID/PP Number')" />
                <x-text-input wire:model.lazy="id_number" id="id_number" class="block mt-1 w-full" type="text"  :value="old('id_number')" required autocomplete="id_number" />
                <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
            </div>

            <!-- Photo -->
            <div class="mt-4">
                <x-input-label for="photo" :value="__('Photo')" />
                

                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                        @if(!$photo)
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                        </svg>
                        @endif
                        @if($photo)
                        <svg class="checkmark_upload mx-auto h-12 w-12 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                        @endif
                        <div class="mt-4 text-sm leading-6 text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload" wire:model.lazy="photo" type="file" class="sr-only" accept="image/png, image/jpg, image/jpeg">
                        </label>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG up to 1MB</p>
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>
                </div>
            </div>
            
            @if($tournament->verification_document_required)
            <div class="mt-4">
                <x-input-label for="photo" :value="__('Verification Documents')" />
                

                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                        @if(!$verification_document)
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                        </svg>
                        @endif
                        @if($verification_document)
                        <svg class="checkmark_upload mx-auto h-12 w-12 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                        @endif
                        <div class="mt-4 text-sm leading-6 text-gray-600">
                        <label for="file-upload2" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload2" wire:model.lazy="verification_document" type="file" class="sr-only" accept="image/png, image/jpg, image/jpeg, application/pdf">
                        </label>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG , PDF up to 4MB</p>
                        <p class="text-xs font-bold leading-5 text-red-600">Note: Verification documents include National ID, Marriage Cetficate and No-Objection letter</p>
                        <x-input-error :messages="$errors->get('verification_document')" class="mt-2" />
                    </div>
                </div>
            </div>
            @endif

            <!-- Save -->
        
            <div class="flex items-center justify-end mt-4">
                @if($player)
                <x-primary-button wire:click.prevent="update_player()"  class="ml-4">
                    {{ __('Update') }}
                </x-primary-button>
                <x-primary-button wire:click.prevent="clear_selected_player()"  class="ml-4">
                    {{ __('Cancel') }}
                </x-primary-button>
                @else
                <x-primary-button wire:click.prevent="save_player()"  class="ml-4">
                    {{ __('Add') }}
                </x-primary-button>
                @endif
            </div>

        

            
            
        </form>
        @endif
    @endif
     <!-- Team -->
     <div class="mt-4">
        <label class="block font-medium text-sm text-gray-700" for="players">
            Players ({{count($players)}})
        </label>
        <p class="text-xs leading-5 text-gray-600">Click a player to edit detail.</p>
            @if($players )
            <ul role="list" class="mx-auto mt-20 grid grid-cols-1 gap-x-8 gap-y-16 text-center sm:grid-cols-2 md:grid-cols-3 lg:mx-0 lg:max-w-none lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($players as $player)
                <li wire:click="select_player('{{$player->id}}')" class="relative group duration-300 transform cursor-pointer group hover:bg-blue-600 rounded-xl p-4">
                    @if ($current_team->status !== 'participated')
                        <button wire:click="delete_player('{{$player->id}}')" type="button" class="absolute top-0 right-0 mt-[-5px] mr-[-5px] rounded-full bg-red-600 p-1 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100 hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>

                        </button>  
                    @endif
                        
                    @if($player->photo)
                    <img class="mx-auto bg-white h-24 w-24 rounded-full object-cover" src="{{ asset('storage/' . $player->photo) }}" alt="">
                    @else
                    <img class="mx-auto h-24 w-24 rounded-full object-cover" src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=200" alt="">
                    @endif
                    <h3 class="relative inline-flex items-center mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">
                    {{$player->player_name}} ({{$player->jersey_number}})
                    </h3>
                    @if($tournament->player_type_required)
                    <h3 class="items-center mt-1 text-base font-semibold leading-7 tracking-tight text-gray-700">
                        {{ $player->type->label() }}
                    </h3>
                    @endif
                    <p class="text-sm leading-6 text-gray-600">{{$player->id_number}}</p>
                </li>
                @endforeach
               
            </ul>
            @else
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M34 40h10v-4a6 6 0 00-10.712-3.714M34 40H14m20 0v-4a9.971 9.971 0 00-.712-3.714M14 40H4v-4a6 6 0 0110.713-3.714M14 40v-4c0-1.313.253-2.566.713-3.714m0 0A10.003 10.003 0 0124 26c4.21 0 7.813 2.602 9.288 6.286M30 14a6 6 0 11-12 0 6 6 0 0112 0zm12 6a4 4 0 11-8 0 4 4 0 018 0zm-28 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <h2 class="mt-2 text-base font-semibold leading-6 text-gray-900">Add player(s) to your team</h2>
                <p class="mt-1 text-sm text-gray-500">You haven’t added any player to your team yet.</p>
            </div>
            @endif
        </div>
        
       
    <div class="flex items-center justify-end mt-4">
            @if(session()->has('success'))
                <p class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </p>
            @endif
            @if(session()->has('error'))
                <p class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </p>
            @endif
            <x-primary-button wire:click.prevent="previous_step()"  class="ml-4">
                {{ __('Back') }}
            </x-primary-button>
            @if (count($players) >= 8)
            <x-primary-button wire:click.prevent="next_step()"  class="ml-4">
                {{ __('Next') }}
            </x-primary-button>
            @endif
           
    </div>
</div>
</div>
