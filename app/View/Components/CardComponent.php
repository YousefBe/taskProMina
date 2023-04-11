<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $isAlbum ;
    public $image ;
    public $album ;
    public $imageData ;
    public function __construct( $image ,$album=null  , $imageData= null)
    {
        $this->isAlbum = $album ? true : false;
        $this->album = $album;
        $this->image = $image;
        $this->imageData = $imageData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-component');
    }
}
