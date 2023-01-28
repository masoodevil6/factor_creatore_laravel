<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComponentListAddressDownloadApp extends Component
{
    public $linkApps;
    public $color;
    public function __construct($linkApps , $color="dark")
    {
        $this ->linkApps = $linkApps;
        $this ->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.component-list-address-download-app');
    }
}
