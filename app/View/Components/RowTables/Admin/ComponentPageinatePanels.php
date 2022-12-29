<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentPageinatePanels extends Component
{

    public $array = [];
    public function __construct($list)
    {
        $max = floor($list->total() / $list->perPage()) + 1;
        if ($list->total() % $list->perPage() == 0){
            $max = floor($list->total() / $list->perPage());
        }
        $this->ReadyPageInate($list->currentPage() , $max , $list->path());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-pageinate-panels');

    }


    private function ReadyPageInate($currentPage = 1 , $total , $path = ""){

        $min = 1;
        $max = 5;
        if ($currentPage <= 3){
            if ($total <6){
                $max = $total;
            }
        }
        else if ($currentPage >= $total - 2 && $currentPage <= $total){
            $min = $total - 4;
            $max = $total;
        }
        else if ($currentPage > 3 && $currentPage < $total - 2){
            $min = $total - 2;
            $max = $total + 2;
        }
        for($i = $min ; $i <= $max; $i++){
            array_push($this->array , $this->GetInfoPage($i , $currentPage , $path));
        }
    }

    private function GetInfoPage($page=1  , $currentPage=1 ,$url = ""){

        $resultExp = [
            "link" => $url ,
            "page" => $page ,
            "selected" => 0
        ];

        $query = parse_url($url, PHP_URL_QUERY);

        if ($query) {
            $resultExp["link"] .= '&page='.$page;
        } else {
            $resultExp["link"] .= '?page='.$page;
        }

        if ($currentPage == $page){
            $resultExp["selected"] = 1;
        }

        return $resultExp;
    }
}
