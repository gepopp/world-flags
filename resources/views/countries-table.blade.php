<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>World Icons</title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3TTTMFZG8L"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-3TTTMFZG8L');
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased">
<script>
    // max-sm	@media not all and (min-width: 640px) { ... }
    // max-md	@media not all and (min-width: 768px) { ... }
    // max-lg	@media not all and (min-width: 1024px) { ... }
    // max-xl	@media not all and (min-width: 1280px) { ... }
    // max-2xl	@media not all and (min-width: 1536px) { ... }
</script>
<div x-data="{
            showLeft: true,
            showLeftSidebar(){
            console.log(window.innerWidth);
                if( window.innerWidth < 768 ){
                    this.showLeft = false;
                }else{
                    this.showLeft = true;
                }
            }
        }"

     x-init="
        showLeftSidebar();

        window.addEventListener('resize', () => {
              showLeftSidebar();
        })

     "
     class="flex min-h-screen bg-orange-50/10 relative">
    <p class="font-semibold text-xs uppercase cursor-pointer absolute top-5 left-10 text-orange-500 z-50" x-on:click="showLeft = !showLeft">
        toggle sidebar</p>
    <div class="hidden md:block w-[250px]"></div>
    <aside
        x-cloak
        x-show="showLeft"
        x-transition:enter="transition-all ease-out duration-500"
        x-transition:enter-start="opacity-0 -translate-x-full"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="bg-white fixed top-0 left-0 min-h-screen flex flex-col w-[250px] border-r border-orange-500 p-10 text-sm text-orange-900 leading-tight z-40 shadow-lg">

        <div>
            <img src="{{ asset('logo.svg') }}" class="h-16"/>
        </div>
        <p>Free SVG flag icons from all (almost right now) countries. MIT-licensed, open source by
            <a href="https://www.linkedin.com/in/gerhard-popp-wien" target="_blank" class="font-semibold underline text-orange-500">Gerhard
                Popp</a></p>

        <h3 class="text-xl font-bold mt-5 mb-3 text-orange-800">Work in progress</h3>
        <p>Currently working on this. In the end there should be one set of 4 icons, rectangular 3:2, square, circle
            and swing for each country. And keep those constantly updated.</p>

        <h3 class="text-xl font-bold mt-5 mb-3 text-orange-800">Missing icons</h3>
        <p>If you miss an icon just send me a message on
            <a href="https://www.linkedin.com/in/gerhard-popp-wien" target="_blank" class="font-semibold underline text-orange-500">LinkeIn</a>.
        </p>

        <a href="https://github.com/gepopp/world-flags.git" target="_blank" class="mt-auto flex space-x-2 items-center">
            <div class="w-8">
                <svg clip-path="w-full" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z" class="jsx-2529474241"></path>
                </svg>
            </div>
            <p>Site and icons on github</p>
        </a>
    </aside>

    <div class="flex-1">
        <livewire:countries-table/>
    </div>

    <div class="hidden xl:block">
        <div class="w-[350px]"></div>
        <aside class="fixed top-0 right-0 min-h-screen flex flex-col w-[350px] border-l border-orange-500 p-10 text-sm text-orange-900 leading-tight">

        </aside>
    </div>


</div>
@if( config('app.debug') )
    <div class="fixed bottom-0 right-0 bg-white/50">
        <p class="font-bold text-black text-5xl p-5 sm:hidden">xs</p>
        <p class="font-bold text-black text-5xl p-5 hidden sm:block md:hidden">sm</p>
        <p class="font-bold text-black text-5xl p-5 hidden md:block lg:hidden">md</p>
        <p class="font-bold text-black text-5xl p-5 hidden lg:block xl:hidden">lg</p>
        <p class="font-bold text-black text-5xl p-5 hidden xl:block 2xl:hidden">xl</p>
        <p class="font-bold text-black text-5xl p-5 hidden 2xl:block">2xl</p>
    </div>
@endif


@livewireScripts
</body>
</html>
