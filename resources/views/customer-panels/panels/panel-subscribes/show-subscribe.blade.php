<section class="border border-dark shadow bg-white mt-lg-0 mt-2 py-1 bg-white d-flex">

    <section onclick="goBackFromShowUserSubscribe()" class="border border-dark rounded float-right cursor-pointer shadow color-family-c-1 mx-2">
        <i class="icon-back-panel fa fa-arrow-right px-2 my-1 text-white" aria-hidden="true"></i>
    </section>

    <section id="title-verify-code-email-or-phone" class="float-right py-1 mx-2">
        اطلاعات اشتراک
    </section>

</section>

<section class=" border border-dark shadow bg-white mt-2 py-1 bg-white row px-2 m-0 d-block">

    <table class="table table-striped table-dark table-bordered">
        <thead>
        <tr>
            <th scope="col" colspan="5" class="w-20 p-0 py-1  text-center font-size-md border-white"> اشتراک</th>
        <tr>
        <tr>
            <th scope="col" class="w-20 p-0 py-1  text-center font-size-md border-white">عنوان اشتراک</th>
            <th scope="col" class="w-20 p-0 py-1  text-center font-size-md border-white">مدت</th>
            <th scope="col" class="w-20 p-0 py-1  text-center font-size-md border-white">مبلغ</th>
            <th scope="col" class="w-20 p-0 py-1  text-center font-size-md border-white">تخفیف</th>
            <th scope="col" class="w-20 p-0 py-1  text-center font-size-md border-white">مبلغ کل</th>
        <tr>
        </thead>

        <tbody>
        <tr class="table-light text-dark table-bordered ">
            <td class="p-0 py-1 text-center  font-size-md bg-warning font-weight-bold">
                {{$userSubscribe["title"]}}
            </td>
            <td class="p-0 py-1 text-center  font-size-md">
                {{$userSubscribe["duration"]}}
                ماهه
            </td>
            <td class="p-0 py-1 text-center  font-size-md">
                {{$userSubscribe["real_price"]}}
                تومان
            </td>
            <td class="p-0 py-1 text-center  font-size-md">
                {{$userSubscribe["off_price"]}}
                تومان
            </td>
            <td class="p-0 py-1 text-center  font-size-md">
                {{$userSubscribe["total_price"]}}
                تومان
            </td>
        </tr>
        </tbody>

    </table>


    <table class="table table-striped table-dark table-bordered">
        <thead>
        <tr>
            <th scope="col" colspan="5" class="w-20 p-0 py-1  text-center font-size-md border-white"> پرداخت </th>
        <tr>
        <tr>
            <th scope="col" class="w-20 p-0 py-1  text-center font-size-md border-white">شروع</th>
            <th scope="col" class="w-20 p-0 py-1  text-center font-size-md border-white">پایان</th>
            <th scope="col" class="w-20 p-0 py-1  text-center font-size-md border-white">وضعیت اشتراک</th>
            <th scope="col" class="w-20 p-0 py-1  text-center font-size-md border-white">وضعیت پرداخت</th>

        <tr>
        </thead>

        <tbody>
        <tr class="table-light text-dark table-bordered ">
            <td class="p-0 py-1 text-center  font-size-md">
                {{jalaliDate($userSubscribe["time_start"])}}
            </td>
            <td class="p-0 py-1 text-center  font-size-md">
                {{jalaliDate($userSubscribe["time_end"])}}
            </td>
            <td class="p-0 py-1 text-center  font-size-md @if(!$userSubscribe["active"]) font-weight-bold text-white bg-danger @endif">
                @if($userSubscribe["active"])
                    منقضی نشده
                @else
                    منقضی شده
                @endif
            </td>
            <td class="p-0 py-1 text-center  font-size-md font-weight-bold text-white @if($userSubscribe["status"]["id"] == 1) bg-success @else bg-danger @endif">
                {{$userSubscribe["status"]["title"]}}
            </td>

        </tr>
        </tbody>

    </table>

    @if(sizeof($userSubscribe["forms"]) > 0)
        <ul class="list-group p-0">

            <li class="list-group-item bg-dark px-2 py-1 text-white" aria-current="true">فرم ها</li>

            @foreach($userSubscribe["forms"] As $key => $itemForm)
                @if($key < 5)
                    <li class="list-group-item px-4 py-1">{{$itemForm["form_name"]}}</li>
                @endif
            @endforeach

            @if(sizeof($userSubscribe["forms"]) > 0)
                <li class="list-group-item px-4 py-1">...</li>
            @endif
        </ul>
    @endif

</section>

@if($userSubscribe["status"]["id"] == 0 && $userSubscribe["active"])



    <a href="#"  class="float-left font-size-md btn btn-success rounded  text-white text-center mt-2 py-1 shadow mr-2">
        <i class="fa fa-credit-card text-white"></i>
        خرید اشتراک
    </a>

    <form  method="post" action="{{route("customer-panel.subscribes.delete-user-subscribe" , $userSubscribe["id"])}}" >
        @csrf
        @method("delete")

        <section onclick="goToConfirmDeleteForm(this)" title="حذف" class="float-left font-size-md btn btn-danger rounded  text-white text-center mt-2 py-1 shadow">
            <i class="fa fa-trash text-white"></i>
            حذف
        </section>
    </form>

@endif