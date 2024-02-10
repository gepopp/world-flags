@props(['icon'])
<tr>
    <td colspan="5">
        <div class="flex space-x-2">
            <div>
                <div class="w-20 flex items-center aspect-square p-2 m-2 shadow-lg border border-slate-300 rounded-lg">
                    <img src="{{ $icon['url'] }}" class="object-cover"/>
                </div>
            </div>

            <div x-data="{
                                        copied: false,
                                        copy(){
                                           clipboard.copy(this.$refs.code.value);
                                           this.copied = true;
                                           setTimeout( () => this.copied = false, 1500 );
                                        } }" class="w-full flex-1 p-2 m-2 shadow-lg border border-slate-300 rounded-lg">

                <div class="flex">
                    <textarea x-ref="code" class="w-full text-xs">{!! trim($icon['code']) !!}</textarea>
                </div>
                <div class="mt-4 flex justify-between w-full">
                    <div>
                        <button class="rounded-full border border-orange-500 text-orange-500 text-sm px-4 py-1 leading-none uppercase shadow-lg bg-white font-semibold" x-on:click="copy()">
                            <span >copy</span>
                        </button>
                    </div>
                    <div>
                        <p class="px-4 text-green-400 flex items-center space-x-2" x-transition x-cloak x-show="copied">
                            <svg class="w-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"></path>
                            </svg>
                            <span>copied</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>
