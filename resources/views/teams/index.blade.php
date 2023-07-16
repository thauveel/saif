<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul role="list" class="divide-y divide-gray-200">
                @foreach($teams as $team)
                <li class="relative flex justify-between gap-x-6 py-2">
                    <div class="flex gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('storage/' . $team->logo) }}" alt="">
                    <div class="min-w-0 flex-auto ml-4">
                        <p class="text-sm font-semibold leading-6 text-gray-900">
                        <a href="#">
                            <span class="absolute inset-x-0 -top-px bottom-0"></span>
                            {{$team->name}}
                        </a>
                        </p>
                        <p class="mt-1 flex text-xs leading-5 text-gray-500">
                        <a href="mailto:{{$team->email}}" class="relative truncate hover:underline">{{$team->email}} | {{$team->phone}}</a>
                        </p>
                    </div>
                    </div>
                    <div class="hidden md:flex items-center gap-x-4">
                        <div class="flex -space-x-0.5">
                            @foreach($team->latestplayers as $player)
                                <dd>
                                <img class="h-6 w-6 rounded-full bg-gray-50 ring-2 ring-white" src="https://images.unsplash.com/photo-1505840717430-882ce147ef2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Emma Dorsey">
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
</x-app-layout>
