<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class UserTicketApiController extends BaseApiController
{

    /* [POST]
     * ====================================
     *  url=> /user/tickets/send
     *====================================
     * ticketCategoryId , ticketFolderId , title , text
     * ====================================
     *  RETURN  1 , 0
     */
    public function sendTicket(Request $request){
        if ($request->has("ticketCategoryId") && $request->has("ticketFolderId") && $request->has("title") && $request->has("text")){
            $ticketCategoryId = $request->get("ticketCategoryId");
            $ticketFolderId = $request->get("ticketFolderId");
            $title = $request->get("title");
            $text = $request->get("text");
            if (ContextRepository::TicketFolderRepository()->SubmitTicketAuthUser($ticketCategoryId , $ticketFolderId , $title , $text)){
                return  1;
            }
            else{
                return 0;
            }

        }
        return response("" , 404);
    }







    /* [POST]
     * ====================================
     *  url=> /user/tickets/form-send
     *====================================
     *
     * ====================================
     *  [
     *      categories => LIST[OBJECT["id" , "title"]]
     *      category_id => INT
     *      ticket_title => ""
     *  ]
     */
    public function formSend(Request $request){
        $resultExp = [
            "categories" => [] ,
            "category_id" => 0 ,
            "ticket_title" => ""
        ];

        $getCategories = false;
        if ($request->has("ticketFolderId")){

            $ticketFolderId = $request->get("ticketFolderId");
            if ($ticketFolderId > 0){
                $ticket = ContextRepository::TicketFolderRepository()->getResult($ticketFolderId );
                if (!empty($ticket)){
                    $resultExp["category_id"] = $ticket["ticket_category_id"];
                    $resultExp["ticket_title"] = $ticket["title"];

                    $getCategories = true;
                }
            }
            else{
                $getCategories = true;
            }

        }

        if ($getCategories){
            $categories = ContextRepository::TicketCategoryRepository()->getAllResult(true);

            $resDefault = [
                "id" => 0 ,
                "title" => "دیگر" ,
            ];
            array_push($resultExp["categories"] , $resDefault);

            foreach ($categories As $itemCategory){
                $res = [
                    "id" => $itemCategory["id"] ,
                    "title" => $itemCategory["title"] ,
                ];
                array_push($resultExp["categories"] , $res);
            }
            return $resultExp;
        }

        return response("" , 404);

    }








    /* [POST]
     * ====================================
     *  url=> /user/tickets/list
     *====================================
     *
     * ====================================
     *  list [
     *      OBJECT["id" , "title" , "status_title" , "created_at" , "text" ]
     * ]
     */
    public function listTickets(Request $request){
        $resultExp = [];
        $tickets = ContextRepository::TicketFolderRepository()->GetAllTicketFolderAuthUser();
        foreach ($tickets As $itemTicket){
            $res = [
                "id" => $itemTicket["id"] ,
                "title" => $itemTicket["title"] ,
                "status_id" => $itemTicket["status"]["id"] ,
                "status_title" => $itemTicket["status"]["title"] ,
                "created_at" => jalaliDate($itemTicket["created_at"]) ,
                "text" => $itemTicket->MainTicket->text,
            ];
            array_push($resultExp , $res);
        }
        return $resultExp;
    }



    /* [POST]
     * ====================================
     *  url=> /user/tickets/info-ticket-selected
     *====================================
     * PARAM ["ticketFolderId"]
     * ====================================
     *  RETURN boolean
     */
    public function infoTicketSelected(Request $request){
        if ($request->has("ticketFolderId")){
            $ticketFolderId = $request->get("ticketFolderId");
            $infoTicket = ContextRepository::TicketFolderRepository()->GetSelectedTicketFolderAuthUser($ticketFolderId);

            if (!empty($infoTicket)){

                $resultExp = [
                    "parent" => [] ,
                    "children" => []
                ];
                if (isset($infoTicket["parent"])){
                    $resultExp["parent"] = [
                        "id" => $infoTicket["parent"]["id"] ,
                        "title" => $infoTicket["parent"]["title"] ,
                        "status_id" => $infoTicket["parent"]["status"]["id"] ,
                        "status_title" => $infoTicket["parent"]["status"]["title"] ,
                        "created_at" => jalaliDate($infoTicket["parent"]["created_at"]) ,
                        "text" => $infoTicket["parent"]["text"],
                        "seen" => $infoTicket["parent"]["seen"],
                    ];


                    if(!empty($infoTicket["parent"]->ticketCategory)){
                        $resultExp["parent"]["category"] = $infoTicket["parent"]->ticketCategory->title;
                    }
                    else{
                        $resultExp["parent"]["category"] = "دیگر";
                    }
                }
                if (isset($infoTicket["children"])){
                    $resultChild = [];
                    foreach ($infoTicket["children"] as $itemChild){
                        $resChild=[
                            "id" => $itemChild["id"] ,
                            "title" => $itemChild["title"] ,
                            "status_title" => $itemChild["status"]["title"] ,
                            "created_at" => jalaliDate($itemChild["created_at"]) ,
                            "text" => $itemChild["text"],
                            "seen" => $itemChild["seen"],
                            "is_admin" => false
                        ];

                        if (isset($itemChild["admin_id"]) && $itemChild["admin_id"]!= null){
                            $resChild["is_admin"] = true;
                        }
                        array_push($resultChild , $resChild);
                    }
                    $resultExp["children"] = $resultChild;
                }

                return $resultExp;
            }


        }
        return response("" , 404);
    }
}
