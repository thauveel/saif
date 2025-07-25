<x-tournament-layout :tournament="$tournament">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tournaments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <ul role="list" class="divide-y divide-gray-200">
                @foreach($tournaments as $tournament)
                <li class="relative flex justify-between gap-x-6 py-2">
                    <div class="flex gap-x-4">
                    <span class="relative inline-block">
                        <img class="h-16 w-16 rounded-full object-cover" src="{{  $tournament->logo }}" alt="">
                        @if($tournament->status == 'draft')
                        <span class="absolute right-0 top-0 block h-4 w-4 rounded-full bg-red-400 ring-2 ring-white"></span>
                        @else
                        <span class="absolute right-0 top-0 block h-4 w-4 rounded-full bg-green-400 ring-2 ring-white"></span>
                        @endif
                    </span>
                    <div class="min-w-0 flex-auto ml-4">
                        <p class="text-sm font-semibold leading-6 text-gray-900">
                        <a href="{{route('tournaments.show',$tournament)}}">
                            <span class="absolute inset-x-0 -top-px bottom-0"></span>
                            {{$tournament->name}}
                        </a>
                        </p>
                        <p class="mt-1 flex text-xs leading-5 text-gray-500">
                        <p  class="relative truncate hover:underline">{{$tournament->venue}} | {{$tournament->due_date->toFormattedDateString()}} | {{$tournament->date->toFormattedDateString()}}</p>
                        </p>
                    </div>
                    </div>
                    <div class="hidden md:flex items-center gap-x-4">
                        <div class="flex -space-x-0.5">
                            @foreach($tournament->latestteams as $team)
                                <dd>
                                    @if($team->logo)
                                    <img class="h-6 w-6 rounded-full bg-gray-50 ring-2 ring-white object-cover" src="{{ asset('storage/' . $team->logo) }}">
                                    @else
                                    <svg class="h-6 w-6 rounded-full bg-gray-50 ring-2 ring-white text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    @endif
                                </dd>
                                <dd>
                            @endforeach
                            
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>


        </div>

        

    </div>

    <div class="max-w-7xl py-10 mx-auto sm:px-6 lg:px-8 bg-white">
            {{$tournaments->links()}}
        </div>
</x-tournament-layout>
