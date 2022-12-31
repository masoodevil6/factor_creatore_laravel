<section class="border border-dark shadow bg-white mt-2 mt-lg-0  bg-white">

    <section class="border-bottom border-dark color-family-1 text-center text-white">
        تیکت های ارسال شده
    </section>

    <section id="form_list_main_tickets" class="mx-2 my-3">

        @foreach($ticketFolders As $itemTicketFolder)

            <section onclick="selectTicketInfo({{$itemTicketFolder->id}})" class="border border-dark m-2 cursor-pointer rounded  shadow">

                <section class="border-bottom border-dark bg-dark row p-0 m-0 ">
                    <section class="col-12 text-right text-white font-size-lg px-2">
                        {{$itemTicketFolder->title}}
                    </section>
                    <section class="col-12 text-right text-white font-size-md px-2 row row p-0 m-0">
                        <section class="col-md-6 col-12">
                            [
                            {{jalaliDate($itemTicketFolder->created_at)}}
                            ]
                        </section>

                        <section class="col-md-6 col-12">
                            <section class="@if($itemTicketFolder->status["id"] == 1) text-success @else text-danger @endif text-left bg-white rounded mx-2 my-1 float-left px-2 py-1">
                                [
                                {{$itemTicketFolder->status["title"]}}
                                ]
                            </section>
                        </section>
                    </section>
                </section>

                <section class=" px-2 row p-0 m-0">
                    <section class="col-12 pt-1 font-size-md">
                        {{$itemTicketFolder->MainTicket->text}}
                    </section>
                    <section class="col-12">
                        <button type="button" class="btn btn-primary float-left m-2 py-1 font-size-md ">
                            مشاهده
                        </button>
                    </section>
                </section>

            </section>

        @endforeach

    </section>

</section>

<section onclick="goToFormSubmitNewTicketClient()"  class="float-left font-size-md btn btn-success rounded  text-white text-center mt-2 py-1 shadow">
    ارسال تیکت جدید
</section>