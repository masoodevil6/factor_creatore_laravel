@extends("admin.layouts.master")
@section("titlePage" , "ادمین- پاسخ به تیکت")


@section("head-tag")

@endsection


@section("content")


    <b class="d-block border-bottom border-success text-success mb-2 px-2">
        اطلاعات
    </b>
    <section class="border border-dark rounded mt-lg-0 mt-2 gray-300 bg-white">
        <section class=" row p-0 m-0">
            <section class="col-md-8 col-12">
                <section class="font-size-lg">
                    {{$ticketFolder->title}}
                    [
                    {{$ticketFolder->ticketCategory->title}}
                    ]
                </section>
            </section>

            <section class="col-md-4 col-12">
                <section class="@if($ticketFolder->status["id"] == 1) text-success @else text-danger @endif text-left gray-200 rounded mx-2 my-1 float-left px-2 py-1">
                    [
                    {{$ticketFolder->status["title"]}}
                    ]
                </section>
            </section>
        </section>
    </section>

    <section class="border-bottom col-12 row m-0 p-0">

        <span class="col-3 line-height-40 text-center bg-grey-shine">
            نویسنده تیکت
        </span>

        <a href="{{--{{route("admin.users.user.info" , $comment->user->id)}}--}}" class="col-9 line-height-40 text-center bg-white">
            {{$ticketFolder->user->fullName}}
        </a>

    </section>





    <b class="d-block border-bottom border-success text-success my-2 px-2">
        تیکت ها
    </b>
    @foreach($ticketFolder->tickets As $itemTicket)
        <section class="border border-dark rounded mt-2 gray-300 bg-white mr-4">
            <section class="border-bottom border-dark row p-0 m-0">
                <section class="col-md-8 col-12">
                    <section class="text-left gray-200 rounded mx-2 my-1 float-right px-2 py-1">
                        [
                        @if($itemTicket->admin_id > 0)
                            ادمین
                        @else
                            کاربر
                        @endif
                        ]
                    </section>
                </section>

                <section class="col-md-4 col-12">
                    <section class="text-danger font-size-md float-left">
                        {{jalaliDate($itemTicket->created_at)}}
                    </section>
                </section>
            </section>
            <section class="px-2 py-1 font-size-md">
                {{$itemTicket->text}}
            </section>
        </section>

    @endforeach




    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.tickets.ticket.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='route("admin.tickets.ticket.change-status" , $ticketFolder->id ) '>

                    <x-fields.component-select-options
                            title-en="status"
                            title-fa="وضعیت">

                        <option value="0" @if(isset($ticketFolder["status"]["id"]) && $ticketFolder["status"]["id"]==0) selected @endif>بسته </option>
                        <option value="1" @if(isset($ticketFolder["status"]["id"]) && $ticketFolder["status"]["id"]==1) selected @endif> باز </option>

                    </x-fields.component-select-options>


                </x-fields.component-from-data>

            </section>

        </section>

    </section>

    @if($ticketFolder["status"]["id"] == 1)
        <section class="row p-0 m-0 ">
            <section class="main-body-container col-12 my-4 px-2 ">


                <section class="mt-3 border-bottom">

                    <x-fields.component-from-data
                            :action='route("admin.tickets.ticket.submit-answer" , $ticketFolder->id ) '>

                        <x-fields.component-sk-editor
                                title-en="text"
                                title-fa="پاسخ"
                                ck-editor="0"
                                value="" />


                    </x-fields.component-from-data>


                </section>

            </section>
        </section>
    @endif



@endsection


@section("footer-tag")

@endsection