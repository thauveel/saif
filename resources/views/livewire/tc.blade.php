<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <a href="/">
            <x-application-logo class="mt-10 h-20 w-auto fill-current text-gray-500" />
        </a>
    </div>
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
        
    


        <!-- Terms &  Conditions -->
        <div class="mt-4">
        <h2 class="text-xl font-bold mb-4">Terms and Conditions:</h2>
            <ol class="list-decimal pl-6">
                <li class="mb-2">Eligibility: The inter-resort volley championship is open to individuals aged 18 and above, representing registered resorts or hotels.</li>
                <li class="mb-2">Team Registration: Each resort can register only one team comprising a minimum of 6 players and a maximum of 10 players.</li>
                <li class="mb-2">Fair Play: Participants are expected to display sportsmanship and adhere to the rules and regulations set forth by the tournament organizers.</li>
                <li class="mb-2">Liability: The tournament organizers and the hosting resort will not be held responsible for any injuries, damages, or losses incurred during the championship.</li>
                <li class="mb-2">Code of Conduct: Participants must conduct themselves in a respectful and responsible manner, refraining from any form of harassment, discrimination, or unsportsmanlike behavior.</li>
                <li class="mb-2">Consent: By participating in the championship, participants grant the organizers permission to use their names, photographs, and videos for promotional purposes.</li>
                <li class="mb-2">Disqualification: Teams may be disqualified for violating the terms and conditions, displaying misconduct, or failing to comply with the decisions of the tournament officials.</li>
                <li class="mb-2">Refunds: Registration fees are non-refundable, except in cases where the tournament is canceled or postponed by the organizers.</li>
                <li class="mb-2">Schedule Changes: The organizers reserve the right to modify the championship schedule, format, or rules if necessary, and will notify the participating teams in a timely manner.</li>
                <li class="mb-2">Interpretation: Any disputes or concerns arising from the championship will be handled at the discretion of the tournament organizers, and their decisions will be final.</li>
            </ol>
            <p class="mt-4">
                By submitting the application form, participants acknowledge that they have read, understood, and agreed to abide by the terms and conditions outlined above.
            </p> 
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
        <x-primary-button wire:click.prevent="agree()"  class="ml-4">
            {{ __('Agree') }}
        </x-primary-button>
        @endif
    </div>


</div>
