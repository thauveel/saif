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
                    <p class="text-sm font-medium text-gray-500">{{$team->email}} | {{$team->phone}} |
                        {{$team->division}}</p>
                </div>
            </div>
            <div
                class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-3 sm:space-y-0 sm:space-x-reverse md:mt-0 md:flex-row md:space-x-3">

                <div class="mt-4 flex items-center justify-between sm:ml-6 sm:mt-0 sm:flex-shrink-0 sm:justify-start">
                    @if($team->status == 'submitted')
                    <span
                        class="inline-flex items-center rounded-full bg-cyan-100 px-3 py-0.5 text-sm font-medium text-cyan-800">Submitted</span>
                    @else
                    <span
                        class="inline-flex items-center rounded-full bg-orange-100 px-3 py-0.5 text-sm font-medium text-orange-800">Drafted</span>
                    @endif

                    <div class="ml-4 flex overflow-hidden bg-white border divide-x rounded-lg rtl:flex-row-reverse dark:bg-gray-900 dark:border-gray-700 dark:divide-gray-700">
                        <a href="{{ route('teams.print', [$team->tournament, $team]) }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 transition-colors duration-200 sm:text-base sm:px-6 dark:hover:bg-gray-800 dark:text-gray-300 gap-x-3 hover:bg-gray-100">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                            </svg>


                            <span>Print</span>
                        </a>

                        @if($team->status <> 'approved')

                        <a href="{{ route('front.apply', $team->tournament) }}?team={{$team->id}}" target="_blank"  class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 transition-colors duration-200 sm:text-base sm:px-6 dark:hover:bg-gray-800 dark:text-gray-300 gap-x-3 hover:bg-gray-100">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>

                            <span>Resubmit</span>
                        </a>

                        @endif
                        <form name="team-{{$team->id}}" action="{{route('teams.destroy', [$team->tournament, $team])}}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 transition-colors duration-200 sm:text-base sm:px-6 dark:hover:bg-gray-800 dark:text-gray-300 gap-x-3 hover:bg-gray-100">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6 text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>


                            <span>Delete</span>
                        </button>
                        </form>
                    </div>

                


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
                            <ul role="list"
                                class="mx-auto mt-20 grid grid-cols-1 gap-x-8 gap-y-16 text-center sm:grid-cols-2 md:grid-cols-3 lg:mx-0 lg:max-w-none lg:grid-cols-4 xl:grid-cols-5">
                                @foreach ($team->players as $player)
                                <li
                                    class="relative group duration-300 transform cursor-pointer group hover:bg-blue-600 rounded-xl p-4">

                                    @if($player['photo'])
                                    <img class="mx-auto h-24 w-24 rounded-full object-cover"
                                        src="{{ asset('storage/' . $player['photo']) }}" alt="">
                                    @else
                                    <img class="mx-auto h-24 w-24 rounded-full object-cover"
                                        src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=200"
                                        alt="">
                                    @endif
                                    <h3
                                        class="relative inline-flex items-center gap-x-1.5 mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">
                                        {{$player['player_name']}} ({{$player['jersey_number']}})
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
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                        src="{{ asset('storage/' . $official['photo']) }}" alt="">
                                    @else
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                        src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=200"
                                        alt="">
                                    @endif
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">
                                            <a href="#">
                                                <span class="absolute inset-x-0 -top-px bottom-0"></span>
                                                {{$official['official_name']}}
                                            </a>
                                        </p>
                                        <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                            <a href="tel:{{$official['phone']}}"
                                                class="relative truncate hover:underline">{{$official['phone']}}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-x-4">
                                    <div class="hidden sm:flex sm:flex-col sm:items-end">
                                        <p class="text-sm leading-6 text-gray-900">{{$official['type']}}</p>
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