<div class="mt-10">
    <h2 @class([
        "text-2xl font-bold",
        "text-orange-800/25" => empty($country),
        "text-orange-800" => !empty($country),
        ])><span class="text-orange-800">Icon:</span> {{ empty($country) ? 'Select a icon' : $country . ' ' . $dir }}
    </h2>
    <textarea @disabled(empty($country))
              class="disabled:bg-gray-300/10 disabled:cursor-not-allowed w-full border border-orange-500 rounded-l-xl text-xs" rows="11">{{ $iconCode }}</textarea>
    <div class="mt-4 flex space-x-4">

        <a href="{{ $svgUrl }}"
           download
            @class([
                 "px-4 py-2 rounded-full border border-orange-800 text-orange-800 font-semibold shadow-lg",
                 "invisible" => empty($svgUrl)
             ])>Download
            SVG</a>
        <a href="{{ $aiUrl }}"
           download
           @class([
                "px-4 py-2 rounded-full border border-orange-800 text-orange-800 font-semibold shadow-lg",
                "invisible" => empty($aiUrl)
            ])>Download
            AI</a>
    </div>
</div>
