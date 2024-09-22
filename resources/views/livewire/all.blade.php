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


        <!-- Team -->
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="players">
                Players ({{count($players)}})
            </label>
                @if($players )
                <ul role="list" class="mx-auto mt-20 grid grid-cols-1 gap-x-8 gap-y-16 text-center sm:grid-cols-2 md:grid-cols-3 lg:mx-0 lg:max-w-none lg:grid-cols-4 xl:grid-cols-5">
                    @foreach ($players as $player)
                    <li class="relative group duration-300 transform cursor-pointer group hover:bg-blue-600 rounded-xl p-4">
                    
                        @if($player['photo'])
                        <img class="mx-auto h-24 w-24 rounded-full object-cover" src="{{ asset('storage/' . $player['photo']) }}" alt="">
                        @else
                        <img class="mx-auto h-24 w-24 rounded-full object-cover" src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=200" alt="">
                        @endif
                        <h3 class="relative inline-flex items-center gap-x-1.5 mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">
                        {{$player['player_name']}} ({{$player['jersey_number']}})
                            @if($player['is_libero'])
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            </span>
                            @endif
                        </h3>
                        <p class="text-sm leading-6 text-gray-600">{{$player['id_number']}}</p>
                    </li>
                    @endforeach
                
                </ul>
                @endif
                <label class="block font-medium text-sm text-gray-700" for="players">
                Officials ({{count($officials)}})
            </label>
            @if($officials )
            <ul role="list" class="mx-auto mt-20 grid grid-cols-1 gap-x-8 gap-y-16 text-center sm:grid-cols-2 md:grid-cols-3 lg:mx-0 lg:max-w-none lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($officials as $official)
                <li class="relative group duration-300 transform cursor-pointer group hover:bg-blue-600 rounded-xl p-4">
                    
                    @if($official['photo'])
                    <img class="mx-auto h-24 w-24 rounded-full object-cover" src="{{ asset('storage/' . $official['photo']) }}" alt="">
                    @else
                    <img class="mx-auto h-24 w-24 rounded-full object-cover" src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=200" alt="">
                    @endif
                    <h3 class="relative inline-flex items-center gap-x-1.5 mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">
                        {{$official['official_name']}} ({{$official['official_type']}})
                        
                    </h3>
                    <p class="text-sm leading-6 text-gray-600">{{$official['id_number']}}</p>
                </li>
                @endforeach
            
            </ul>
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
        @if (count($officials) >= 3 && count($players)>= 6)
        <x-primary-button wire:click.prevent="next_step()"  class="ml-4">
            {{ __('Next') }}
        </x-primary-button>
        @endif
    </div>


</div>
