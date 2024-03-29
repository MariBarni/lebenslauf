<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">    
    <head>
        <meta charset="utf-8">
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        @googlefonts
        <link rel="icon" type="image/png" href="{{ asset('storage/icons/favicon.png') }}">


        <title>{{ config('app.name') }}</title>

        <style>[x-cloak] { display: none !important; }</style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])         
        @livewireStyles
        @livewireScripts
        @stack('scripts')
      

    </head>

    <body class="antialiased bg-white"> 
   
        @include('layouts/navigation')
    
        @guest
        <livewire:multi-step-form>
        @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
        @endguest

    
    @yield('content')

    @livewire('notifications')

    @include('layouts/footer')
</body>
</html>