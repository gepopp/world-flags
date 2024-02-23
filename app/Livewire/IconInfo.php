<?php

namespace App\Livewire;

use App\Actions\Countries;
use App\Actions\SvgCode;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class IconInfo extends Component
{

    public string $iconCode;

    public string $dir = '';

    public string $country = '';

    public string $svgUrl = '';

    public string $aiUrl = '';

    public string $pngUrl = '';


    #[On( 'iconinfo' )]
    public function iconinfo( $dir, $country )
    {
        $svgPath =  "icons/$dir/$country.svg";

        $this->svgUrl   = SvgCode::fileUrl( $svgPath );
        $this->pngUrl   = SvgCode::pngUrl( $svgPath );
        $this->aiUrl   = SvgCode::aiUrl( $svgPath );
        $this->dir      = Str::ucfirst( $dir );
        $this->country  = Countries::name( $country );
        $this->iconCode = SvgCode::cleanSvgCode( $svgPath );
        $this->dispatch( 'iconinfoloaded' );
    }

    public function render()
    {
        return view( 'livewire.icon-info' );
    }
}
