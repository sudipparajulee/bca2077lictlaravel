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
        <div class="flex">
            <div class="w-56 h-screen bg-gray-100 shadow">
                <img src="https://bitmapitsolution.com/images/logo/logo.png" alt="" class="p-2 m-2 w-10/12 mx-auto mt-5 bg-white rounded-lg shadow-lg ">
                <div class="mt-5">
                    <a href="{{route('dashboard')}}" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Dashboard</a>
                    <a href="{{route('categories.index')}}" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Categories</a>
                    <a href="" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Products</a>
                    <a href="" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Users</a>
                    <a href="" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Orders</a>
                    <a href="" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Logout</a>
                </div>
            </div>
            <div class="p-4 flex-1">
                @yield('content')
            </div>
        </div>
    </body>
</html>