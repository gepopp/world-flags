<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Actions\SvgCode;

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
            $countries[ $index ]['icons'] = [];
            $countries[ $index ]['link'] = Article::where('country', Str::lower($country['let3']))->first()?->link ?? "" ;
        }

        $dirs = glob( public_path( 'icons/*' ), GLOB_ONLYDIR );

        foreach ( $dirs as $dir ) {
            $dir                = Str::afterLast( $dir, '/' );
            $this->dir_filter[] = $dir;
            $this->dirs[]       = $dir;

            foreach ( $countries as $index => $country ) {

                $code = Str::lower( $country['let3'] );

                if ( file_exists( public_path( "icons/$dir/$code.svg" ) ) ) {
                    $countries[ $index ]['icons'][ $dir ] = [
                        'dir'     => $dir,
                        'country' => $code,
                        'url'     => asset( "icons/$dir/$code.svg" ),
                        'code' => SvgCode::cleanSvgCode(public_path( "icons/$dir/$code.svg" ))
                    ];
                    $this->iconsCount ++;
                }
            }
        }

        $this->countries = $this->filteredCountries = $countries;
    }


    public function render()
    {
        return view( 'livewire.countries-table' );
    }
}
