<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


        <title>{{ config('app.name') }}</title>

        <style>[x-cloak] { display: none !important; }</style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    
     
        @livewireStyles
        @livewireScripts
        @stack('scripts')

    </head>

    <body class="antialiased">   
<section class="h-screen w-screen bg-gradient-to-br from-pink-50 to-indigo-100 p-8">
    <h1 class="text-center font-bold text-2xl text-indigo-500">Design Wählen </h1>

    <div class="grid justify-center md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7 my-10">
    @foreach ($designs as $design)
             <!-- Card 1 -->
             <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
            <img class="h-56 lg:h-60 w-full object-cover" src="{{ asset('storage/'.$design->designimg) }}" alt="" />
            <div class="p-3">
                <span class="text-sm text-primary">November 19, 2022</span>
                <h3 class="font-semibold text-xl leading-6 text-gray-700 my-2">
                International Women's Day 2022: Date, history, significance, theme this year
                </h3>
                <p class="paragraph-normal text-gray-600">
                Happy Women's Day 2022: Read on to know all about the history and significance...
                </p>
                <a class="mt-3 block" href="#">Read More >></a>
            </div>
        </div>
    @endforeach
   

        <!-- Card 2 -->
        <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
            <img class="h-56 lg:h-60 w-full object-cover" src="https://images.unsplash.com/photo-1607748862156-7c548e7e98f4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fHdvbWVuJTIwZW1wb3dlcm1lbnR8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="" />
            <div class="p-3">
                <span class="text-sm text-primary">November 19, 2022</span>
                <h3 class="font-semibold text-xl leading-6 text-gray-700 my-2">
                International Women's Day 2022: Date, history, significance, theme this year
                </h3>
                <p class="paragraph-normal text-gray-600">
                Happy Women's Day 2022: Read on to know all about the history and significance...
                </p>
                <a class="mt-3 block" href="#">Read More >></a>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
            <img class="h-56 lg:h-60 w-full object-cover" src="https://images.unsplash.com/photo-1637419450536-378d5457abb8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTl8fHdvbWVuJTIwZW1wb3dlcm1lbnR8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="" />
            <div class="p-3">
                <span class="text-sm text-primary">November 19, 2022</span>
                <h3 class="font-semibold text-xl leading-6 text-gray-700 my-2">
                International Women's Day 2022: Date, history, significance, theme this year
                </h3>
                <p class="paragraph-normal text-gray-600">
                Happy Women's Day 2022: Read on to know all about the history and significance...
                </p>
                <a class="mt-3 block" href="#">Read More >></a>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
            <img class="h-56 lg:h-60 w-full object-cover" src="https://images.unsplash.com/photo-1621352404112-58e2468993a0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mjd8fHdvbWVuJTIwZW1wb3dlcm1lbnR8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="" />
            <div class="p-3">
                <span class="text-sm text-primary">November 19, 2022</span>
                <h3 class="font-semibold text-xl leading-6 text-gray-700 my-2">
                International Women's Day 2022: Date, history, significance, theme this year
                </h3>
                <p class="paragraph-normal text-gray-600">
                Happy Women's Day 2022: Read on to know all about the history and significance...
                </p>
                <a class="mt-3 block" href="#">Read More >></a>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
            <img class="h-56 lg:h-60 w-full object-cover" src="https://images.unsplash.com/photo-1607868894064-2b6e7ed1b324?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mjl8fHdvbWVuJTIwZW1wb3dlcm1lbnR8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="" />
            <div class="p-3">
                <span class="text-sm text-primary">November 19, 2022</span>
                <h3 class="font-semibold text-xl leading-6 text-gray-700 my-2">
                International Women's Day 2022: Date, history, significance, theme this year
                </h3>
                <p class="paragraph-normal text-gray-600">
                Happy Women's Day 2022: Read on to know all about the history and significance...
                </p>
                <a class="mt-3 block" href="#">Read More >></a>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
            <img class="h-56 lg:h-60 w-full object-cover" src="https://images.unsplash.com/photo-1633329712176-4751f52ccc1b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzV8fHdvbWVuJTIwZW1wb3dlcm1lbnR8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="" />
            <div class="p-3">
                <span class="text-sm text-primary">November 19, 2022</span>
                <h3 class="font-semibold text-xl leading-6 text-gray-700 my-2">
                International Women's Day 2022: Date, history, significance, theme this year
                </h3>
                <p class="paragraph-normal text-gray-600">
                Happy Women's Day 2022: Read on to know all about the history and significance...
                </p>
                <a class="mt-3 block" href="#">Read More >></a>
            </div>
        </div>
    </div>
  
</section>
@yield('content')

@livewire('notifications')


</body>
</html>
