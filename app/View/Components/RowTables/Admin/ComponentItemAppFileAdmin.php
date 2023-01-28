<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemAppFileAdmin extends Component
{

    public $appFileKey;
    public $appFileId;
    public $appFileName;
    public $appFileVersion;
    public $appFileFormat;
    public $appFileSize;
    public $appFileCategory;
    public function __construct($appFileKey , $appFileId , $appFileName , $appFileVersion, $appFileFormat , $appFileSize , $appFileCategory)
    {
        $this -> appFileKey = $appFileKey;
        $this -> appFileId = $appFileId;
        $this -> appFileName = $appFileName;
        $this -> appFileVersion = $appFileVersion;
        $this -> appFileFormat = $appFileFormat;
        $this -> appFileSize = $appFileSize;
        $this -> appFileCategory = $appFileCategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-app-file-admin');
    }
}
