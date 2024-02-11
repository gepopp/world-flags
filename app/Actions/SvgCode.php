<?php

namespace App\Actions;

use Illuminate\Support\Str;

class SvgCode
{

    public static function fileUrl( $path ): string
    {

        return file_exists(public_path($path)) ? asset( $path ) : '';
    }

    public static function aiUrl( $path ): string
    {
        $path = Str::replace('svg', 'ai', $path);
        return file_exists( public_path( $path )) ? asset( $path ) : '';
    }


    public static function cleanSvgCode( $path ): string
    {
        $contents = file_get_contents( $path );
        $contents = preg_replace( '/<!--(.*?)-->/s', '', $contents );
        $contents = preg_replace( '/<\?xml(.*?)>/s', '', $contents );

        return trim( $contents );
    }

}
