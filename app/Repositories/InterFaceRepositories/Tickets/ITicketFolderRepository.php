<?php
namespace App\Repositories\InterFaceRepositories\Tickets;

use App\Models\Ticket\TicketFolder;
use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ITicketFolderRepository extends IBaseRepository {

    function SearchTicketFolder(string $userName="", int $Status=-1, int $ticketCategory=0 , $numInPage=15);

    public function AnswerTicketFolder(TicketFolder $ticketFolder , string $ticketText) : bool;

    function GetAllTicketFolderAuthUser();

    function GetSelectedTicketFolderAuthUser(int $ticketFolderId);

    function SubmitTicketAuthUser($ticketCategoryId , $ticketFolderId , $title , $text);

}