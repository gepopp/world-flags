<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory, HasSlug;


    public function link(): Attribute
    {
        return Attribute::make(
            get: fn() => route( 'article.show', $this )
        );
    }

    public function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn() => Str::words( strip_tags( $this->content ), 20 )
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
                          ->generateSlugsFrom( 'title' )
                          ->saveSlugsTo( 'slug' );
    }
}
