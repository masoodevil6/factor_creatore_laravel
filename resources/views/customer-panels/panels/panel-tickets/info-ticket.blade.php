<b class="d-block border-bottom border-success text-success mb-2 px-2">
    سوال
</b>
<section class="border border-dark rounded mt-lg-0 mt-2  bg-white">
    <section class="border-bottom border-dark row p-0 m-0 color-family-1">
        <section class="col-md-8 col-12">
            <section class="font-size-lg text-white">
                {{$tickets["parent"]->title}}
                [
                @if(!empty($tickets["parent"]->ticketCategory))
                    {{$tickets["parent"]->ticketCategory->title}}
                @else
                    دیگر
                @endif

                ]
            </section>
            <section class="text-white font-size-md">
                {{jalaliDate($tickets["parent"]->created_at)}}
            </section>
        </section>

        <section class="col-md-4 col-12">
            <section class="@if($tickets["parent"]->status["id"] == 1) text-success @else text-danger @endif text-left gray-200 rounded mx-2 my-1 float-left px-2 py-1">
                [
                {{$tickets["parent"]->status["title"]}}
                ]
            </section>
        </section>
    </section>
    <section class="px-2 py-1 font-size-md">
        {{$tickets["parent"]->text}}
    </section>
</section>

@if(sizeof($tickets["children"])>0)
    <b class="d-block border-bottom border-success text-success my-2 px-2">
        پاسخ ها
    </b>
    @foreach($tickets["children"] As $itemTicket)
        <section class="border border-dark rounded mt-2 gray-300 bg-white mr-4">
            <section class="border-bottom border-dark row p-0 m-0 color-family-1">

                <section class="col-md-4 col-12">
                    <section class="float-right text-right gray-200 rounded mx-2 my-1  px-2 py-1">
                        [
                        @if($itemTicket->admin_id > 0)
                            ادمین
                        @else
                            شما
                        @endif
                        ]
                    </section>
                </section>

                <section class="col-md-8 col-12">
                    <section class="text-white font-size-md text-left">
                        {{jalaliDate($itemTicket->created_at)}}
                    </section>
                </section>


            </section>
            <section class="px-2 py-1 font-size-md">
                {{$itemTicket->text}}
            </section>
        </section>

    @endforeach
@endif

@if($tickets["parent"]->status["id"] == 1)
    <section onclick="goToFormSubmitNewTicketClient({{$tickets["parent"]->ticket_folder_id}} , '{{$tickets["parent"]->title}}')"  class="float-left font-size-md btn btn-success rounded  text-white text-center mt-2 py-1 shadow">
        ارسال تیکت
    </section>
@endif



