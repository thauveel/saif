<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="UCVL ">
    <meta name="title" content="UCVL ">
    <meta name="author" content="UCVL ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="UC">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/img/afv/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/fav/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>
    {{ config('app.name', 'Thauveel') }}
    </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
</head>

<body class="bg-white ">
    
    <div class="relative">
        <div aria-hidden="true" class="absolute inset-0 grid grid-cols-2 -space-x-52 opacity-40">
            <div class="blur-[106px] h-56 bg-gradient-to-br from-blue-600 to-purple-400"></div>
            <div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400 to-sky-300"></div>
          </div>
        <div class="relative container m-auto px-6 md:px-12 lg:px-7">
            <div class="py-40 ml-auto">
                <div class="lg:w-2/3 justify-center text-center mx-auto">
                    <div class="flex justify-center">
                    <img class="w-32 h-auto relative" src="/logo.png"/>
                    </div>
                    <h1 class="text-gray-900 font-bold text-5xl md:text-6xl xl:text-7xl">Join the Action at RAC <span class="text-[#07bab4]">Tournament Portal</span></h1>
                    <p class="mt-8 text-gray-700">Browse through our list of exciting tournaments. Find the perfect challenge for your team and register to compete for glory. Stay updated on dates, formats, and rules to get ahead of the competition!!</p>
                   
                </div>
            </div>
        </div> 
    </div>

    <div>
        {{$slot}}
    </div>
  

    <footer class="bg-white">
        <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
            <nav class="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">
            <!-- <div class="pb-6">
                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">About</a>
            </div>
            <div class="pb-6">
                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Blog</a>
            </div>
            <div class="pb-6">
                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Jobs</a>
            </div>
            <div class="pb-6">
                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Press</a>
            </div>
            <div class="pb-6">
                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Accessibility</a>
            </div>
            <div class="pb-6">
                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Partners</a>
            </div> -->
            </nav>
            <div class="mt-10 flex justify-center space-x-10">
            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Facebook</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Instagram</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">X</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z" />
                </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">GitHub</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">YouTube</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                </svg>
            </a>
            </div>
            <ped class="mt-10 text-center text-xs leading-5 text-gray-500">&copy; 2020 Raa Atoll Council Inc. All rights reserved. Devloped by Thauveel</p>
        </div>
    </footer>
    
</body>

</html>
