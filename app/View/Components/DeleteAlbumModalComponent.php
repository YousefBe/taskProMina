<?php

namespace App\View\Components;

use App\Models\Album;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteAlbumModalComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $albums ;
    public function __construct()
    {
        $this->albums = Album::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-album-modal-component');
    }
}
