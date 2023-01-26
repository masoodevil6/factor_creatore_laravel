<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;
use Symfony\Component\HttpFoundation\Request;

class ComponentPageinatePanels extends Component
{

    public $array = [];
    public function __construct($list  , Request $request, $extraUrl="" , $url="")
    {
        $max = floor($list->total() / $list->perPage()) + 1;
        if ($list->total() % $list->perPage() == 0){
            $max = floor($list->total() / $list->perPage());
        }

        $realUrl = $list->path();
        if (!empty($url)){
            $realUrl = $url;
        }

        $this->ReadyPageInate($list->currentPage() , $max  , $request->getUri() , $realUrl ,$extraUrl);
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


    private function ReadyPageInate($currentPage = 1 , $total , $path = "" , $realPath=""  , $extraUrl){

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
            $min = $currentPage - 2;
            $max = $currentPage + 2;
        }

;
        for($i = $min ; $i <= $max; $i++){
            array_push($this->array , $this->GetInfoPage($i , $currentPage , $path , $realPath , $extraUrl));
        }
    }

    private function GetInfoPage($page=1  , $currentPage=1 ,$url = "" , $realUrl="" , $extraUrl){

        $resultExp = [
            "link" => $realUrl ,
            "page" => $page ,
            "selected" => 0
        ];

        $url_parts = parse_url($url);
        if (isset($url_parts['query'])) { // Avoid 'Undefined index: query'
            parse_str($url_parts['query'], $params);
        } else {
            $params = array();
        }

        $existPageParam = false;
        foreach ($params As $key=>$param){
            if ($key == "page"){
                $params[$key] = $page;
                $existPageParam = true;
                break;
            }
        }
        if (!$existPageParam){
            $params["page"] = $page;
        }

        $url_parts['query'] = http_build_query($params);
        $resultExp["link"] .= '?'.$url_parts['query'].$extraUrl;

        if ($currentPage == $page){
            $resultExp["selected"] = 1;
        }

        return $resultExp;
    }
}
