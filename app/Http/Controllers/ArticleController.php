<?php

namespace App\Http\Controllers;

use App\Actions\SvgCode;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        $code = $article->country;

        $dirs = glob( public_path( 'icons/*' ), GLOB_ONLYDIR );

        $icons = [];

        foreach ( $dirs as $dir ) {

            $dir = Str::afterLast($dir, '/');
            $icons[] = [
                'dir' => $dir,
                'country' => $code,
                'url' => asset( "icons/$dir/$code.svg" ),
                'code' => SvgCode::cleanSvgCode( public_path( "icons/$dir/$code.svg" ) )
            ];
        }

        $icons = collect($icons)->toJson();

        return view('article', compact('article', 'icons'));
    }
}
