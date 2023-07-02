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
                        <!-- Completed Step -->
                        <a class="group relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-300 bg-white hover:border-gray-400">
                            <span class="h-2.5 w-2.5 rounded-full bg-transparent group-hover:bg-gray-300" aria-hidden="true"></span>
                        </a>
                        @else
                        <!-- Current Step -->
                        <a href="#" class="relative flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 hover:bg-indigo-900">
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

        <form wire:submit.prevent="submit">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Team Name')" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email"  :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="number"  :value="old('phone')" required autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Logo -->
            <div class="mt-4">
                <x-input-label for="logo" :value="__('Team Logo')" />

                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                        @if(!$logo)
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                        </svg>
                        @endif
                        @if($logo)
                        <img class="mx-auto h-12 w-auto" src="{{ $logo->temporaryUrl() }}">
                        @endif
                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload" wire:model="logo" type="file" class="sr-only" accept="image/png, image/jpg, image/jpeg">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG up to 1MB</p>
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>
                </div>

            </div>

            <!-- Save -->
        
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
                <x-primary-button wire:click.prevent="save_team()"  class="ml-4">
                    {{ __('Next') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
