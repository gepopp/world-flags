<x-skeleton :$article>
    <div class="w-full py-10 px-4 flex justify-center">
        <div class="max-w-3xl w-full">
            <a href="{{ route('home') }}" class="text-orange-500 underline flex items-center space-x-3 mb-3">
                <svg class="w-4 h-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5"></path>
                </svg>
                <span>Back to all countries</span>
            </a>
            <h1 class="text-orange-800 font-bold text-5xl">{{ $article->title }}</h1>
            <div class="article-content">
                <div class="float-left w-48 aspect-square bg-orange-50 m-5 rounded-full">
                    <img src="{{ \App\Actions\SvgCode::fileUrl("icons/circle/$article->country.svg") }}"/>
                </div>

                {!! $article->content !!}
            </div>
        </div>
    </div>
</x-skeleton>
