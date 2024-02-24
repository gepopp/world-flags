<x-skeleton :$article>
    <div class="w-full py-10 px-4 flex justify-center">
        <div class="max-w-3xl w-full">
            <a href="{{ route('home') }}" class="text-orange-500 underline flex items-center space-x-3 mb-3">
                <svg class="w-4 h-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5"></path>
                </svg>
                <span>Back to all countries</span>
            </a>
            <div class="my-10">
                {{ $article->getFirstMedia() }}
            </div>
            <h1 class="text-orange-800 font-bold text-5xl">{{ $article->title }}</h1>


            <div x-data="{ icons : {{ $icons }} }"
                 x-init="$dispatch('iconinfo', { country: '{{ $article->country }}', dir: 'base' });"
                class="my-10 col-span-4 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-6 gap-4 border border-slate-300">
                <template x-for="icon in icons" :key="icon.url">
                    <div x-data="copyCode"
                         x-on:click="
                                copy();
                                $dispatch('iconinfo', { country: icon.country, dir: icon.dir });
                                $wire.set('selection', { country: icon.country, dir: icon.dir });
                                "
                         class="flex flex-col items-center aspect-square p-2 m-2 shadow-lg border border-slate-300 hover:border-orange-500 transition-all duration-300 rounded-lg cursor-pointer">
                        <div class="w-full aspect-square flex items-center w-full rounded overflow-hidden">
                            <img :src="icon.url" class="object-cover drop-shadow-xl w-full"/>
                            <textarea x-ref="code" class="hidden" x-text="icon.code"></textarea>
                        </div>
                    </div>
                </template>
            </div>


            <div class="article-content">
                <div class="float-left w-48 aspect-square bg-orange-50 m-5 rounded-full">
                    <img src="{{ \App\Actions\SvgCode::fileUrl("icons/circle/$article->country.svg") }}"/>
                </div>

                {!! $article->content !!}
            </div>
        </div>
    </div>
</x-skeleton>
