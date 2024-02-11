<div x-data="countriesTable" class="p-4 md:p-14 pt-14 overflow-y-auto">
    <div class="mb-2 pb-10">
        <input
            x-model="searchTerm"
            class="w-full bg-orange-50 placeholder:text-orange-800 border-orange-300 focus:border-orange-500 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-full shadow-sm'"
            type="search"
            placeholder="search country"/>
        <div class="flex justify-end text-xs mt-1 mr-4 text-orange-300">
            <p>{{ $iconsCount }} icons available</p>
        </div>
    </div>
    <div class="text-orange-500">
        <template x-for="country in filteredCountries" :key="country.let3">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 mt-4">
                <div class="p-2 text-left border-b-2 border-slate-300 font-bold uppercase" x-text="country.name"></div>
                <div class="hidden sm:block p-2 text-left border-b-2 border-slate-300" x-text="country.let2"></div>
                <div class="p-2 text-left border-b-2 border-slate-300" x-text="country.let3"></div>
                <div class="col-span-4 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-6 gap-4 border border-slate-300">
                    <template x-for="icon in country.iconArray" :key="country.let3 + icon.url">
                        <div x-data="copyCode"
                             x-on:click="copy(); $dispatch('iconinfo', { dir: icon.dir, country: icon.country })"
                             class="flex flex-col items-center aspect-square p-2 m-2 shadow-lg border border-slate-300 hover:border-orange-500 transition-all duration-300 rounded-lg cursor-pointer">
                            <div class="w-full aspect-square flex items-center w-full rounded overflow-hidden">
                                <img :src="icon.url" class="object-cover drop-shadow-xl w-full"/>
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
            copy() {
                clipboard.copy(this.$refs.code.value);
                this.copied = true;
                this.$dispatch('copied');
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
