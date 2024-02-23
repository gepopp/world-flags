<div class="mt-10"
     x-data="{ loading: @entangle() }"
     x-on:iconinfo.window="loading = true"
     x-on:iconinfoloaded.window="loading = false"
     class="relative">
    <div x-cloak x-show="loading" class="absolute inset-0 bg-white/50"></div>
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
