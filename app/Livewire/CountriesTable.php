<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class CountriesTable extends Component
{

    public array $countries = [];

    public array $filteredCountries = [];

    public string $search = '';


    public array $dirs = [];


    public array $dir_filter = [];

    public int $iconsCount = 0;

    public function mount()
    {
        $countries = json_decode( file_get_contents( public_path( 'countries.json' ) ), true );

        foreach ( $countries as $index => $country ) {
            $countries[$index]['icons'] = [];
        }

        $dirs = glob( public_path( 'icons/*' ), GLOB_ONLYDIR );

        foreach ( $dirs as $dir ) {
            $dir = Str::afterLast( $dir,  '/' );
            $this->dir_filter[] = $dir;
            $this->dirs[] = $dir;

            foreach ( $countries as $index => $country ) {

                $code = Str::lower( $country['let3'] );

                if ( file_exists( public_path( "icons/$dir/$code.svg" ) ) ) {
                    $countries[$index]['icons'][ $dir ] = [
                        'url'  => asset( "icons/$dir/$code.svg" ),
                        'code' => $this->cleanSvgCode(public_path( "icons/$dir/$code.svg")),
                    ];
                    $this->iconsCount ++;
                }
            }
        }

        $this->countries = $this->filteredCountries = $countries;
    }

    public function cleanSvgCode($path)
    {
        $contents = file_get_contents( $path );
        $contents = preg_replace('/<!--(.*?)-->/s', '', $contents);
        $contents = preg_replace('/<\?xml(.*?)>/s', '', $contents);
        return $contents;
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
