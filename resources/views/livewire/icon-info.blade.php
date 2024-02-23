<div class="mt-10"
     x-data="{ loading:false }"
     x-on:iconinfo.window="loading = true"
     x-on:iconinfoloaded.window="loading = false"
     class="relative">
    <div x-cloak x-show="loading" class="absolute inset-0 bg-white/50 flex items-center justify-center">
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-orange-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>
    <h2 @class([
        "text-2xl font-bold",
        "text-orange-800/25" => empty($country),
        "text-orange-800" => !empty($country),
        ])><span class="text-orange-800">Icon:</span> {{ empty($country) ? 'Select a icon' : $country . ' ' . $dir }}
    </h2>
    <textarea @disabled(empty($country))
              class="disabled:bg-gray-300/10 disabled:cursor-not-allowed w-full border border-orange-500 rounded-l-xl text-xs" rows="11">{{ $iconCode }}</textarea>
    <div class="mt-4 flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
        <a href="{{ $svgUrl }}"
           download
            @class([
                 "px-4 py-2 rounded-full border border-orange-800 text-orange-800 font-semibold shadow-lg text-center",
                 "invisible" => empty($svgUrl)
             ])>Download
            SVG</a>
        <a href="{{ $aiUrl }}"
           download
            @class([
                 "px-4 py-2 rounded-full border border-orange-800 text-orange-800 font-semibold shadow-lg text-center",
                 "invisible" => empty($aiUrl)
             ])>Download
            AI</a>
        @if(!empty($pngUrl))
            <a href="{{ $pngUrl }}"
               download
                @class([
                     "px-4 py-2 rounded-full border border-orange-800 text-orange-800 font-semibold shadow-lg text-center",
                     "invisible" => empty($pngUrl)
                 ])>Download
                PNG</a>
        @endif
    </div>
</div>
