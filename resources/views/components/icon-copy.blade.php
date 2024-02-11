<div class="flex flex-col items-center aspect-square p-2 m-2 shadow-lg border border-slate-300 rounded-lg">
    <div class="w-full aspect-square flex items-center">
        <img :src="icon.url" class="object-cover drop-shadow-lg"/>
    </div>
    <div x-data="copyCode" class="w-full flex-1 py-2 mt-2 pt-2 border-t border-slate-300">
        <button
            x-on:click="copy()"
            x-show="!copied"
            class="text-xs leading-relaxed block w-full text-center rounded-full border border-orange-500 text-orange-500 text-sm px-4 py-1 leading-none uppercase shadow-lg bg-white font-semibold">
            <span>copy</span>
        </button>
        <div x-cloak x-show="copied"
             class="text-xs leading-relaxed w-full text-center border border-white px-4 py-1 uppercase text-green-600">
            copied!
        </div>
        <div class="mt-2">
            <a :href="icon.url" download class="text-xs leading-relaxed block w-full text-center rounded-full border border-indigo-500 text-indogo-500 py-1 uppercase shadow-lg bg-white font-semibold" x-on:click="copy()">
                <span>download</span>
            </a>
        </div>
        <textarea x-ref="code" class="hidden" x-text="icon.code"></textarea>
    </div>
</div>
