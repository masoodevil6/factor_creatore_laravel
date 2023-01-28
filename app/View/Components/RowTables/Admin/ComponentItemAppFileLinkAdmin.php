<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemAppFileLinkAdmin extends Component
{
    public $appFileLinkKey;
    public $appFileLinkId;
    public $appFileLinkName;
    public $appFileLinkImage;
    public $appFileLinkStatus;
    public $appFile;
    public $appFileCategory;
    public function __construct($appFileLinkKey , $appFileLinkId , $appFileLinkName, $appFileLinkImage , $appFileLinkStatus, $appFile , $appFileCategory)
    {
        $this -> appFileLinkKey = $appFileLinkKey;
        $this -> appFileLinkId = $appFileLinkId;
        $this -> appFileLinkName = $appFileLinkName;
        $this -> appFileLinkImage = $appFileLinkImage;
        $this -> appFileLinkStatus = $appFileLinkStatus;
        $this -> appFile = $appFile;
        $this -> appFileCategory = $appFileCategory;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-app-file-link-admin');
    }
}
