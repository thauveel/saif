

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Tournament Manager ">
        <meta name="title" content="TM ">
        <meta name="author" content="Thauveel ">
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
        <link rel="manifest" href="/build/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.tournament_navigation',
                ['tournament' => $tournament])

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
