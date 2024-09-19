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
        <p class="my-4">
                Click below button to download the terms and conditions.
        </p>
        <a href="{{$tournament->tc}}" class="block bg-indigo-500 flex gap-x-3 text-sm sm:text-base items-center justify-center text-white rounded-lg hover:bg-indigo-300 duration-300 transition-colors border border-transparent px-8 py-2.5" download><svg class="w-5 h-5 sm:h-6 sm:w-6" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke="currentColor" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
            <span>Download</span>
        </a>
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
