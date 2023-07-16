<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-3xl md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl">
            <div class="flex items-center space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <img class="h-16 w-16 rounded-full" src="{{ asset('storage/' . $team->logo) }}" alt="">
                        <span class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></span>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{$team->name}}</h1>
                    <p class="text-sm font-medium text-gray-500">{{$team->email}} | {{$team->phone}}</p>
                </div>
            </div>
            <div
                class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-3 sm:space-y-0 sm:space-x-reverse md:mt-0 md:flex-row md:space-x-3">

                <div class="mt-4 flex items-center justify-between sm:ml-6 sm:mt-0 sm:flex-shrink-0 sm:justify-start">
                    @if($team->status == 'submitted')
                    <span class="inline-flex items-center rounded-full bg-cyan-100 px-3 py-0.5 text-sm font-medium text-cyan-800">Submitted</span>
                    @else
                    <span class="inline-flex items-center rounded-full bg-orange-100 px-3 py-0.5 text-sm font-medium text-orange-800">Drafted</span>
                    @endif

                    <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                    <button type="button"
                                class="-my-2 flex items-center rounded-full bg-white p-2 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                <span class="sr-only">Open options</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z">
                                    </path>
                                </svg>
                            </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link> -->
                        
                    </x-slot>
                </x-dropdown>

                    
                </div>

            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <!-- Page header -->


        <div
            class="mx-auto mt-8 grid max-w-3xl grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
            <div class="space-y-6 lg:col-span-2 lg:col-start-1">
                <!-- Description list-->
                <section aria-labelledby="applicant-information-title">
                    <div class="bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h2 id="applicant-information-title" class="text-lg font-medium leading-6 text-gray-900">
                                Players</h2>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Total: {{$team->players()->count()}}</p>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        @if($team->players )
                            <ul role="list" class="mx-auto mt-20 grid grid-cols-1 gap-x-8 gap-y-16 text-center sm:grid-cols-2 md:grid-cols-3 lg:mx-0 lg:max-w-none lg:grid-cols-4 xl:grid-cols-5">
                                @foreach ($team->players as $player)
                                <li class="relative group duration-300 transform cursor-pointer group hover:bg-blue-600 rounded-xl p-4">
                                
                                    @if($player['photo'])
                                    <img class="mx-auto h-24 w-24 rounded-full" src="{{ asset('storage/' . $player['photo']) }}" alt="">
                                    @else
                                    <img class="mx-auto h-24 w-24 rounded-full" src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=200" alt="">
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
                            @else
                            <p> No Players</p>
                            @endif
                        </div>
                        
                    </div>
                </section>

                <!-- Comments-->
                
            </div>

            <section aria-labelledby="timeline-title" class="lg:col-span-1 lg:col-start-3">
                <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                    <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Officials</h2>

                    <!-- Activity Feed -->
                    <div class="mt-6 flow-root">
                    @if($team->officials)
                    
                    <ul role="list" class="divide-y divide-gray-100">
                    @foreach ($team->officials as $official)
                        <li class="relative flex justify-between gap-x-6 py-5">
                            <div class="flex gap-x-4">
                            @if($official['photo'])
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('storage/' . $official['photo']) }}" alt="">
                            @else
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=200" alt="">
                            @endif
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-x-0 -top-px bottom-0"></span>
                                    {{$official['official_name']}}
                                </a>
                                </p>
                                <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                <a href="tel:{{$official['phone']}}" class="relative truncate hover:underline">{{$official['phone']}}</a>
                                </p>
                            </div>
                            </div>
                            <div class="flex items-center gap-x-4">
                            <div class="hidden sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm leading-6 text-gray-900">{{$official['official_type']}}</p>
                            </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                    @else
                    <div class="text-center">
                        <h2 class="mt-2 text-base font-semibold leading-6 text-gray-900">No officials found</h2>
                        <p class="mt-1 text-sm text-gray-500">You haven’t added any official to your team yet.</p>
                    </div>
                    @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>