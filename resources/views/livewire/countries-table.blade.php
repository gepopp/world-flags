<div x-data="countriesTable" class="p-14 overflow-y-auto">
    <div class="mb-2 pb-10">
        <input
            x-model="searchTerm"
            class="w-full bg-orange-50 placeholder:text-orange-800 border-orange-300 focus:border-orange-500 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-full shadow-sm'"
            type="search"
            placeholder="search country"/>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 text-orange-500">
        <div class="p-2 text-left whitespace-nowrap font-semibold border-b-2 border-slate-300">
            {{ __('Country') }}
        </div>
        <div class="hidden sm:block p-2 text-left whitespace-nowrap font-semibold border-b-2 border-slate-300">
            {{ __('ALPHA 2') }}
        </div>
        <div class="p-2 text-left whitespace-nowrap font-semibold border-b-2 border-slate-300">
            {{ __('ALPHA 3') }}
        </div>
        <div class="hidden lg:block p-2 text-left whitespace-nowrap font-semibold border-b-2 border-slate-300">
            {{ __('TLD') }}
        </div>
        <template x-for="country in filteredCountries" :key="country.let3">
            <div class="col-span-4  grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 mt-4">
                <div class="p-2 text-left border-b-2 border-slate-300 font-bold uppercase" x-text="country.name"></div>
                <div class="hidden sm:block p-2 text-left border-b-2 border-slate-300" x-text="country.let2"></div>
                <div class="p-2 text-left border-b-2 border-slate-300" x-text="country.let3"></div>
                <div class="hidden lg:block p-2 text-left border-b-2 border-slate-300" x-text="country.tld"></div>
                <div class="col-span-4 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-4 border border-slate-300">
                    <template x-for="icon in country.iconArray" :key="country.let3 + icon.url">
                        <div class="flex flex-col items-center aspect-square p-2 m-2 shadow-lg border border-slate-300 rounded-lg">
                            <div class="w-full aspect-square flex items-center w-full rounded overflow-hidden">
                                <img :src="icon.url" class="object-cover drop-shadow-xl w-full"/>
                            </div>
                            <div x-data="copyCode" class="w-full flex-1 py-2 mt-2 pt-2 border-t border-slate-300">
                                <button
                                    x-on:click="copy()"
                                    x-show="!copied"
                                    class="text-xs leading-none block w-full text-center rounded-full border border-orange-500 text-orange-500 text-sm px-4 py-2 leading-none uppercase shadow-lg bg-white font-semibold">
                                    <span>copy</span>
                                </button>
                                <div x-cloak x-show="copied"
                                     class="text-xs leading-relaxed w-full text-center border border-white px-4 py-1 uppercase text-green-600">
                                    copied!
                                </div>
                                <div class="mt-2">
                                    <a :href="icon.url" download class="text-xs leading-none block w-full text-center rounded-full text-indigo-700 border border-indigo-500 text-indogo-500 py-2 uppercase shadow-lg bg-white font-semibold" x-on:click="copy()">
                                        <span>download</span>
                                    </a>
                                </div>
                                <textarea x-ref="code" class="hidden" x-text="icon.code"></textarea>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </template>
    </div>
    </template>
</div>
@script
<script>
    Alpine.data('copyCode', (code) => {
        return {
            copied: false,
            copy() {
                clipboard.copy(this.$refs.code.value);
                this.copied = true;
                setTimeout(() => this.copied = false, 1500);
            }
        }
    });

    Alpine.data('countriesTable', () => {
        return {
            searchTerm: '',
            countries: @this.countries,
            filteredCountries: null,
            init() {
                this.countries.map((c) => {
                    c.iconArray = Object.values(c.icons);
                })
                this.filteredCountries = this.countries;
                this.$watch('searchTerm', () => this.search());
            },
            search() {
                this.filteredCountries = this.countries.filter((c) => {
                    return c.name.toLowerCase().includes(this.searchTerm.toLowerCase())
                        || c.let2.toLowerCase().includes(this.searchTerm.toLowerCase())
                        || c.let3.toLowerCase().includes(this.searchTerm.toLowerCase());
                })
            }
        }
    })

</script>
@endscript
