@if(sizeof($comments->listComment) > 0)
    <section class="border border-dark shadow bg-white mt-2 mt-lg-0 ">

        <section class="border-bottom border-dark color-family-1 text-center text-white">
            نظرات ها
        </section>

        <section id="form_list_main_comment" class="d-block  mx-5 mx-lg-2 my-3 row ">

            @foreach($comments->listComment As $key => $itemComment)

                <section class="border border-dark rounded mt-lg-0 mx-2 my-3  bg-white  position-relative">
                    <section class="border-bottom border-dark row p-0 m-0 color-family-1">
                        <section class="col-md-8 col-12">
                            <section class="font-size-lg text-white">
                                نظر
                            </section>
                            <section class="text-white font-size-md">
                                {{jalaliDate($itemComment["comment"]->created_at)}}
                            </section>
                        </section>

                        <section class="col-md-4 col-12">
                            <section class="@if($itemComment["comment"]->approved == 1) text-success @else text-danger @endif text-left gray-200 rounded ml-5 mr-2 my-1 float-left px-2 py-1">
                                @if($itemComment["comment"]->approved == 1)
                                    تایید شده
                                @else
                                    تایید نشده
                                @endif
                            </section>
                        </section>
                    </section>

                    <section class="px-2 py-1 font-size-md">
                        {{$itemComment["comment"]->body}}
                    </section>


                    @foreach($itemComment["answers"] As $key => $itemAnswer)
                        <section class="border border-dark rounded mt-2 gray-300 bg-white mr-4 my-1 ml-1">
                            <section class="border-bottom border-dark row p-0 m-0 color-family-1">

                                <section class="col-md-4 col-12">
                                    <section class="float-right text-right gray-200 rounded mx-2 my-1  px-2 py-1">
                                        پاسخ
                                    </section>
                                </section>

                                <section class="col-md-8 col-12">
                                    <section class="text-white font-size-md text-left">
                                        {{jalaliDate($itemAnswer->created_at)}}
                                    </section>
                                </section>


                            </section>
                            <section class="px-2 py-1 font-size-md">
                                {{$itemAnswer->body}}
                            </section>
                        </section>
                    @endforeach


                    <form  method="post" action="{{route("customer-panel.comments.delete-user-comment" , $itemComment["comment"]->id)}}" >
                        @csrf
                        @method("delete")

                        <section onclick="goToConfirmDeleteForm(this)" title="حذف" class="btn-one btn-panel cursor-pointer position-absolute bg-danger border border-dark rounded shadow">
                            <i class="fa fa-trash position-absolute text-white"></i>
                        </section>
                    </form>

                </section>

            @endforeach

        </section>

        <x-row-tables.admin.component-pageinate-panels
                :list="$comments"/>

    </section>
@else
    <x-component-not-exist-item
            title="نظری"/>
@endif


<a href="{{route("customer.home")}}#send-comment"  class="float-left font-size-md btn btn-success rounded  text-white text-center mt-2 py-1 shadow">
    ثبت نظر جدید
</a>