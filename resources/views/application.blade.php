<x-guest-layout>
    <x-slot name="header">
    <nav aria-label="Progress">
        <ol role="list" class="flex items-center">
            <li class="relative pr-8 sm:pr-20">
            <!-- Current Step -->
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="h-0.5 w-full bg-gray-200"></div>
            </div>
            <a href="#" class="relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-indigo-600 bg-white" aria-current="step">
                <span class="h-2.5 w-2.5 rounded-full bg-indigo-600" aria-hidden="true"></span>
                <span class="sr-only">Step 3</span>
            </a>
            </li>
            <li class="relative pr-8 sm:pr-20">
            <!-- Upcoming Step -->
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="h-0.5 w-full bg-gray-200"></div>
            </div>
            <a href="#" class="group relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-300 bg-white hover:border-gray-400">
                <span class="h-2.5 w-2.5 rounded-full bg-transparent group-hover:bg-gray-300" aria-hidden="true"></span>
                <span class="sr-only">Step 4</span>
            </a>
            </li>
            <li class="relative pr-8 sm:pr-20">
            <!-- Upcoming Step -->
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="h-0.5 w-full bg-gray-200"></div>
            </div>
            <a href="#" class="group relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-300 bg-white hover:border-gray-400">
                <span class="h-2.5 w-2.5 rounded-full bg-transparent group-hover:bg-gray-300" aria-hidden="true"></span>
                <span class="sr-only">Step 4</span>
            </a>
            </li>
            <li class="relative pr-8 sm:pr-20">
            <!-- Upcoming Step -->
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="h-0.5 w-full bg-gray-200"></div>
            </div>
            <a href="#" class="group relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-300 bg-white hover:border-gray-400">
                <span class="h-2.5 w-2.5 rounded-full bg-transparent group-hover:bg-gray-300" aria-hidden="true"></span>
                <span class="sr-only">Step 4</span>
            </a>
            </li>
            <li class="relative">
            <!-- Upcoming Step -->
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="h-0.5 w-full bg-gray-200"></div>
            </div>
            <a href="#" class="group relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-300 bg-white hover:border-gray-400">
                <span class="h-2.5 w-2.5 rounded-full bg-transparent group-hover:bg-gray-300" aria-hidden="true"></span>
                <span class="sr-only">Step 5</span>
            </a>
            </li>
        </ol>
        </nav>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
