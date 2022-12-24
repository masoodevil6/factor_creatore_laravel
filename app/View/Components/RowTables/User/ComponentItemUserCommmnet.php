<?php

namespace App\View\Components\RowTables\User;

use Illuminate\Routing\Route;
use Illuminate\View\Component;

class ComponentItemUserCommmnet extends Component
{

    public $commentKey;
    public $commentId;
    public $commentBody;
    public $commentSeen;
    public $commentParent;
    public $commentParentId=0;
    public $commentParentTitle="";
    public $commentParentUrl="";
    public $commentStatus;
    public $commentApproved;


    public function __construct($commentKey , $commentId , $commentBody , $commentParent , $commentStatus , $commentSeen , $commentApproved)
    {
        $this->commentKey = $commentKey;
        $this->commentId = $commentId;
        $this->commentBody = $commentBody;
        $this->commentParent = $commentParent;

        if (!empty($this->commentParent)){
            $this->commentParentId = $commentParent->id;
            $this->commentParentTitle = $commentParent->body;
            $this->commentParentUrl = route("admin.user.comments.edit" , $this->commentParentId);
            $this->commentBody = " [ پاسخ ادمین ] ".$commentBody;
        }

        $this->commentSeen = $commentSeen;
        $this->commentStatus = $commentStatus;
        $this->commentApproved = $commentApproved;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.user.component-item-user-commmnet');
    }
}
