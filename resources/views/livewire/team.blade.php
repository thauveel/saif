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
    <h2 class="my-4 text-2xl font-bold text-blue-950 md:text-3xl">{{ $tournament->name }} </h2>
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
                        <a class="relative flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 hover:bg-indigo-900">
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
        @if($current_team)
        <livewire:team-card-small :team="$current_team"/>

        <div class="flex items-center justify-end mt-4">
            @if ($current_team->status <> 'approved')
            <x-primary-button wire:click.prevent="next_step()"  class="ml-4">
                {{ __('Next') }}
            </x-primary-button>
            @endif
        </div>
        @if(!$updated)
            <form wire:submit.prevent="submit">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                
                
                <!-- Jersey Document -->
                <div class="mt-4">
                    <x-input-label for="jersey_document" :value="__('Team Jersey Document')" />

                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            @if(!$jersey_document)
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                            </svg>
                            @endif
                            @if($jersey_document)
                            <svg class="checkmark_upload mx-auto h-12 w-12 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                            @endif
                            <div class="mt-4 text-sm leading-6 text-gray-600">
                            <label for="file-upload2" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload2" wire:model.lazy="jersey_document" type="file" class="sr-only" accept="image/png, image/jpg, image/jpeg, application/pdf">
                            </label>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG, PDF up to 4MB</p>
                            <x-input-error :messages="$errors->get('jersey_document')" class="mt-2" />
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
                    <x-primary-button wire:click.prevent="update_team()"  class="ml-4">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        @endif

        @else
            <form wire:submit.prevent="submit">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Team Name')" />
                    <x-text-input wire:model.lazy="name" id="name" class="block mt-1 w-full" type="text" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model.lazy="email" id="email" class="block mt-1 w-full" type="email"  :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Phone Number -->
                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input wire:model.lazy="phone" id="phone" class="block mt-1 w-full" type="number"  :value="old('phone')" required autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                @if($tournament->is_divisible)
                <!-- Division -->
                <div class="mt-4">
                    <x-input-label for="division" :value="__('Division')" />
                    <div class="mt-2 flex items-center gap-x-3">
                        @foreach(\App\Enum\Division::cases() as $division)
                            <input wire:model.lazy="division" id="division" name="division" type="radio" value="{{ $division->value }}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">{{ $division->label() }}</label>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('division')" class="mt-2" />
                </div>
                @endif

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
                            <svg class="checkmark_upload mx-auto h-12 w-12 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                            @endif
                            <div class="mt-4 text-sm leading-6 text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload" wire:model.lazy="logo" type="file" class="sr-only" accept="image/png, image/jpg, image/jpeg">
                            </label>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG up to 1MB</p>
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                        </div>
                    </div>

                    

                </div>

                @if($tournament->jersey_document_required)
                <!-- Jersey Document -->
                <div class="mt-4">
                    <x-input-label for="jersey_document" :value="__('Team Jersey Document')" />

                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            @if(!$jersey_document)
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                            </svg>
                            @endif
                            @if($jersey_document)
                            <svg class="checkmark_upload mx-auto h-12 w-12 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                            @endif
                            <div class="mt-4 text-sm leading-6 text-gray-600">
                            <label for="file-upload2" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload2" wire:model.lazy="jersey_document" type="file" class="sr-only" accept="image/png, image/jpg, image/jpeg, application/pdf">
                            </label>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG up to 4MB</p>
                            <x-input-error :messages="$errors->get('jersey_document')" class="mt-2" />
                        </div>
                    </div>

                    

                </div>
                @endif

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
        @endif
    </div>
</div>
