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
            showRight: true,
            showLeftSidebar(){
                if( window.innerWidth < 768 ){
                    this.showLeft = false;
                }else{
                    this.showLeft = true;
                }
            },
            showRightSidebar(){
                if( window.innerWidth < 1024 ){
                    this.showRight = false;
                }else{
                    this.showRight = true;
                }
            }
        }"

     x-init="
        showLeftSidebar();
        showRightSidebar();

        window.addEventListener('resize', () => {
              showLeftSidebar();
              showRightSidebar();
        });

        $watch('showLeft', (value) => {
            if( window.innerWidth < 768 && value){
                showRight = false;
            }
        })

        $watch('showRight', (value) => {
            if( window.innerWidth < 768 && value){
                showLeft = false;
            }
        })

     "
     class="flex min-h-screen bg-orange-50/10 relative">
    <div :class="showLeft ? 'fixed' : 'absolute'"
         class="font-semibold text-xs uppercase cursor-pointer top-5 left-4 md:left-10 text-orange-500 z-50" x-on:click="showLeft = !showLeft">
        <p x-cloak x-show="!showLeft" class="hidden md:block">toggle sidebar</p>
        <p x-cloak x-show="!showLeft" class="md:hidden">about flac-icons</p>
        <p x-cloak x-show="showLeft">close</p>
    </div>
    <div :class="showRight ? 'fixed' : 'absolute'"
         class="font-semibold text-xs uppercase cursor-pointer top-5 right-4 md:right-10 text-orange-500 z-50" x-on:click="showRight = !showRight">
        <p x-cloak x-show="!showRight" class="hidden md:block">toggle sidebar</p>
        <p x-cloak x-show="!showRight" class="md:hidden">more info</p>
        <p x-cloak x-show="showRight">close</p>
    </div>


    <div x-show="showLeft" class="hidden md:block w-[250px]"></div>
    <aside
        x-cloak
        x-show="showLeft"
        x-transition:enter="transition-all ease-out duration-500"
        x-transition:enter-start="opacity-0 -translate-x-full"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="bg-white fixed top-0 left-0 min-h-screen flex flex-col w-[250px] border-r border-orange-500 p-10 text-sm text-orange-900 leading-tight z-40 overflow-y-auto shadow-lg">

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

    <div>
        <div x-show="showRight" class="hidden lg:block w-[500px]"></div>
        <aside x-cloak
               x-show="showRight"
               x-on:iconinfoloaded.window="showRight = true"
               x-transition:enter="transition-all ease-out duration-500"
               x-transition:enter-start="opacity-0 translate-x-full"
               x-transition:enter-end="opacity-100 translate-x-0"
               x-transition:leave="transition ease-in duration-500"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="translate-x-full"
               class="fixed top-0 right-0 h-screen overflow-y-auto flex flex-col w-[500px] max-w-[90%] border-l border-orange-500 p-10 text-sm text-orange-900 leading-tight bg-white z-40">
            <livewire:icon-info/>

            <div class="mt-auto">
                <h3 class="text-xl font-bold mt-5 mb-3 text-orange-800">Who did this?</h3>
                <div class="flex space-x-4">
                    <div class="w-16 shrink-0">
                        <img src="{{ asset('headshot.png') }}" class="object-cover rounded-full" alt="Gerhard Popp"/>
                    </div>
                    <div>
                        <h3 class="text-orange-800 font-bold text-xl">Gerhard Popp, freelance web-developer</h3>
                        <p>I'm a web-developer based in Vienna, Austria, working on wordPress and laravel projects since
                            1999</p>
                        <p>Feel free to contact me if you need help with your exciting project.</p>
                        <div class="flex space-x-8 mt-3">
                            <div class="flex items-center space-x-2">
                                <div>
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" height="72" viewBox="0 0 72 72" width="72">
                                        <g fill="none" fill-rule="evenodd">
                                            <path d="M8,72 L64,72 C68.418278,72 72,68.418278 72,64 L72,8 C72,3.581722 68.418278,-8.11624501e-16 64,0 L8,0 C3.581722,8.11624501e-16 -5.41083001e-16,3.581722 0,8 L0,64 C5.41083001e-16,68.418278 3.581722,72 8,72 Z" fill="#007EBB"/>
                                            <path d="M62,62 L51.315625,62 L51.315625,43.8021149 C51.315625,38.8127542 49.4197917,36.0245323 45.4707031,36.0245323 C41.1746094,36.0245323 38.9300781,38.9261103 38.9300781,43.8021149 L38.9300781,62 L28.6333333,62 L28.6333333,27.3333333 L38.9300781,27.3333333 L38.9300781,32.0029283 C38.9300781,32.0029283 42.0260417,26.2742151 49.3825521,26.2742151 C56.7356771,26.2742151 62,30.7644705 62,40.051212 L62,62 Z M16.349349,22.7940133 C12.8420573,22.7940133 10,19.9296567 10,16.3970067 C10,12.8643566 12.8420573,10 16.349349,10 C19.8566406,10 22.6970052,12.8643566 22.6970052,16.3970067 C22.6970052,19.9296567 19.8566406,22.7940133 16.349349,22.7940133 Z M11.0325521,62 L21.769401,62 L21.769401,27.3333333 L11.0325521,27.3333333 L11.0325521,62 Z" fill="#FFF"/>
                                        </g>
                                    </svg>
                                </div>
                                <div>
                                    <a href="https://www.linkedin.com/in/gerhard-popp-wien" target="_blank" class="font-semibold underline text-orange-800 text-lg">LinkedIn</a>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div>
                                    <svg class="w-6 h-6" data-slot="icon" fill="none" stroke-width="3" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <a href="mailto:gerhard@poppgerhard.at" target="_blank" class="font-semibold underline text-orange-800 text-lg">E-Mail</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

        </aside>
    </div>
</div>
<div x-data="{ show: false }">
    <div x-cloak
         x-show="show"
         x-transition
         x-on:copied.window="show = true; setTimeout( () => show = false, 1000)"
         class="fixed bottom-10 left-1/2 -translate-x-1/2 border border-orange-800 bg-orange-500 text-white rounded-lg px-4 py-3 flex items-center">
        <svg class="w-6 mr-2 shrink-0" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
        </svg>
        <p class="whitespace-nowrap">SVG copied</p>
    </div>
</div>

@if( config('app.debug') )
    <div class="fixed bottom-0 right-0 bg-white/50 z-[9999]">
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
