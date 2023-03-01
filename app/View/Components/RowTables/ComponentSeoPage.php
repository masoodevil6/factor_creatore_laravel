<?php

namespace App\View\Components\RowTables;

use Illuminate\View\Component;

class ComponentSeoPage extends Component
{
    public $title;
    public $description;
    public $listKeywords = [];
    public $robots;
    public $listRobots = [];
    public function __construct($title , $description , $listKeywords , $robots , $listRobots)
    {
        $this -> title = $title;
        $this -> description = $description;
        $this -> robots = $robots;

        if (!empty($listKeywords) && sizeof($listKeywords) > 0){
            foreach ($listKeywords as $item){
                array_push($this -> listKeywords , $item["title"]);
            }
        }

        if (!empty($listRobots) && sizeof($listRobots) > 0){
            foreach ($listRobots as $item){
                array_push($this -> listRobots , $item["title"]);
            }
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.component-seo-page');
    }
}
