<div class="md:w-1/2 max-w-7xl mx-auto p-6 lg:p-8">
    <h1 class="text-3xl font-bold">Countries</h1>
    <div class="mt-4 rounded-lg shadow-lg border border-gray-300 bg-white p-4 overflow-y-auto">
        <div class="mb-2 pb-2 border-b border-slate-300">
            <x-text-input wire:model.live="search" class="w-full" type="search" placeholder="search country name"/>
        </div>
        <table class="table table-auto w-full text-slate-500">
            <thead>
            <tr class="border-b border-slate-300 w-full">
                <th class="p-2 text-left">
                    #
                </th>
                <th class="p-2 text-left whitespace-nowrap">
                    {{ __('Country') }}
                </th>
                <th class="p-2 text-left whitespace-nowrap">
                    {{ __('ALPHA 2') }}
                </th>
                <th class="p-2 text-left whitespace-nowrap">
                    {{ __('ALPHA 3') }}
                </th>
                <th class="p-2 text-left whitespace-nowrap">
                    {{ __('TLD') }}
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($filteredCountries as $index => $country)
                <tr class="border-b border-slate-300">
                    <td class="table-cell p-2 text-left">{{ $index + 1 }}</td>
                    <td class="table-cell p-2 text-left">{{ $country['name'] }}</td>
                    <td class="table-cell p-2 text-left">{{ $country['let2'] }}</td>
                    <td class="table-cell p-2 text-left">{{ $country['let3'] }}</td>
                    <td class="table-cell p-2 text-left">{{ $country['tld'] }}</td>
                </tr>
                @if(isset($country['flat']))
                    <x-icon-copy :icon="$country['flat']"/>
                @endif
                @if(isset($country['swing']))
                    <x-icon-copy :icon="$country['swing']"/>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@script
<script>
    Alpine.data('copyCode', (code) => {
        return {
            code,
            copy() {
                navigator.clipboard.writeText(this.code);
            }
        }
    });


    Alpine.data('countries', () => {
        return {
            countries: @entangle('countries'),
            searchTerm: '',
            filteredCountries: [],
            init() {
                this.filteredCountries = this.countries;
                this.$watch('searchTerm', (term) => this.search(term))
            },
            search(term) {
                this.filteredCountries = this.countries.filter((country) => {
                    return (country.name.toLowerCase().includes(term.toLowerCase())
                        || country.let2.toLowerCase().includes(term.toLowerCase())
                        || country.let3.toLowerCase().includes(term.toLowerCase()));
                })
            }
        }
    });
</script>
@endscript
