<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>World Icons</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="antialiased">
        <div class="sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach( glob( public_path() . '/flag-icons/*' ) as $icon )
                    @if(\Illuminate\Support\Str::endsWith( $icon, 'svg'))
                        <div class="rounded-lg bg-white border-slate-300">
                            <img src="{{ asset( 'flag-icons/' . \Illuminate\Support\Str::afterLast($icon, '/') ) }}" class="w-16"/>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @livewireScripts
    </body>
</html>
