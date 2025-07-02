<x-tournament-layout :tournament="$tournament">
    <x-slot name="header">
        <div class="mx-auto max-w-3xl md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl">
            <div class="flex items-center space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <img class="h-16 w-16 rounded-full object-cover" src="{{  $tournament->logo }}" alt="">
                        <span class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></span>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{$tournament->name}}'s Dashboard</h1>
                    {{-- <p class="text-sm font-medium text-gray-500">{{$team->email}} | {{$team->phone}} |
                        {{$team->division}}</p> --}}
                </div>
            </div>
            <div
                class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-3 sm:space-y-0 sm:space-x-reverse md:mt-0 md:flex-row md:space-x-3">

                <div class="mt-4 flex items-center justify-between sm:ml-6 sm:mt-0 sm:flex-shrink-0 sm:justify-start">
                    <span class="{{ $tournament->status->classes() }}">{{ $tournament->status->label()}} </span>
                    

                    <div class="ml-4 flex overflow-hidden bg-white border divide-x rounded-lg rtl:flex-row-reverse">
                        <a href="{{ route('tournaments.edit', $tournament) }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 transition-colors duration-200 sm:text-base sm:px-6 gap-x-3 hover:bg-gray-100">
                            
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m15.232 5.232 3.536 3.536m-2.036-5.036a2.5 2.5 0 0 1 3.536 3.536L6.5 21.036H3v-3.572L16.732 3.732Z"></path>
                            </svg>


                            <span>Edit This tournament</span>
                        </a>
                        

                       

                        
                    </div>

                


                </div>

            </div>
        </div>

        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">Total Subscribers</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">71,897</dd>
                </div>
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">Avg. Open Rate</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">58.16%</dd>
                </div>
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">Avg. Click Rate</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">24.57%</dd>
                </div>
            </dl>
  
  
        </div>
  
        
  
      </div>
</x-tournament-layout>