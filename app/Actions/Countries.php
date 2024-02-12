<?php

namespace App\Actions;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Countries
{
    protected Collection $countries;

    public function __construct()
    {
        $this->countries = collect( json_decode( file_get_contents( public_path( 'countries.json' ) ), true ) );
    }


    public static function codeAndName():array
    {
        $countries = new self();
        $countires_array = [];
        foreach ($countries->countries as $country)
        {
            $countires_array[ Str::lower( $country['let3'] )] = $country['name'];
        }

        return $countires_array;
    }


    public static function name( $code )
    {
        $countries = new self();
        $country = $countries->countries->first( fn($country) => Str::lower($country['let3']) == Str::lower($code) );
        return $country['name'];
    }


}
