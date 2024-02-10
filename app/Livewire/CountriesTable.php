<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class CountriesTable extends Component
{

    public array $countries = [];

    public array $filteredCountries = [];

    public string $search = '';

    public function mount()
    {
        $countries = json_decode( file_get_contents( public_path( 'countries.json' ) ), true );
        foreach ( $countries as $country ) {
            $code = Str::lower( $country['let3'] );
            if ( file_exists( public_path( 'base-flag-icons/' . $code . '.svg' ) ) ) {
                $country['flat'] = [
                    'url'  => asset( "base-flag-icons/$code.svg" ),
                    'code' => file_get_contents( public_path( "base-flag-icons/$code.svg" ) ),
                ];
            }

            if ( file_exists( public_path( 'flag-icons/' . $code . '.svg' ) ) ) {
                $country['swing'] = [
                    'url'  => asset( "flag-icons/$code.svg" ),
                    'code' => file_get_contents( public_path( "flag-icons/$code.svg" ) ),
                ];
            }

            $this->countries[]         = $country;
            $this->filteredCountries[] = $country;
        }
    }


    public function updatedSearch( $value )
    {
        if(empty($value))
        {
            $this->filteredCountries = $this->countries;
        }else{
            $this->filteredCountries = array_filter( $this->countries, function ( $country ) use ( $value ) {
                return Str::contains( $country['name'], $value, true )
                       || Str::contains($country['let2'], $value, true)
                       || Str::contains($country['let3'], $value, true);
            } );
        }
    }

    public function render()
    {
        return view( 'livewire.countries-table' );
    }
}
