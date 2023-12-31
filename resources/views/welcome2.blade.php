<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
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
        <div class="min-h-screen bg-gray-100" style="background-image: url('/images/bg-web-user.png'); background-position: center; background-size: cover;">
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('home') }}">
                                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                @if (Route::has('login'))
                                    @auth
                                        <x-nav-link href="{{ url('/home') }}">Dashboard</x-nav-link>
                                    @else
                                        <x-nav-link href="{{ url('/login') }}">Log in</x-nav-link>

                                        @if (Route::has('complain_create'))
                                            <x-nav-link href="{{ url('/complain/create') }}">Complain</x-nav-link>
                                        @endif
                                        @if (Route::has('register'))
                                            <x-nav-link href="{{ url('/register') }}">Register</x-nav-link>
                                        @endif
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <center>
                                    <div class="grid lg:grid-cols-2 grid-cols-1 items-center gap-6 pb-6">
                                        <div class="order-2 lg:order-1">
                                            <h2 class="xl:text-6xl/tight sm:text-5xl/snug text-3xl/8 font-semibold text-gray-600 mb-8">Computer and Lab Equipment Asset Management FRI</h2>
                                            <p class="sm:text-lg text-base font-normal text-gray-500">Information regarding laboratory equipment and assets in the industrial engineering faculty</p>
                                        </div>

                                        <div class="order-1 lg:order-2 ms-14">
                                            <img src="images/welcome2.png">
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
