<section class=" border border-dark shadow mt-2 p-0 rounded bg-white">

    <button onclick="addOrEditProductInFactor()" type="button" class="btn btn-info text-white   p-1 m-0 m-2 shadow text-center font-size-md  border border-dark text-hover-white  px-2 font-weight-bold font-size-md ">
        افزودن کالا
        <i class="fa fa-add mr-1 border  border-white  rounded p-1"></i>
    </button>

    <div class="table-responsive px-3 mt-2">
        <table class="table table-striped table-bordered mb-1">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="w-5   font-size-12 py-1">ردیف</th>
                <th scope="col" class="w-20  font-size-12 py-1">نام کالا</th>
                <th scope="col" class="w-15  font-size-12 py-1">تعداد</th>
                <th scope="col" class="w-15  font-size-12 py-1">قیمت واحد</th>
                <th scope="col" class="w-15  font-size-12 py-1">تخفیف</th>
                <th scope="col" class="w-20  font-size-12 py-1">قیمت کل</th>
                <th scope="col" class="text-center  font-size-12">
                    <i class="fa fa-cogs"></i>
                    <span>تنظیمات</span>
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach($products As $key => $product)

                <tr>
                    <td class="font-size-12 py-1">
                        {{$key + 1}}
                    </td>
                    <td class="font-size-12 py-1" style="font-weight: bold;">
                        {{$product->name}}
                    </td>
                    <td class="font-size-12 py-1">
                        {{$product->num}}
                        {{$product->unit}}
                    </td>
                    <td class="font-size-12 py-1">
                        {{$product->price_text}}
                    </td>
                    <td class="font-size-12 py-1">
                        {{$product->off_text}}
                    </td>
                    <td class="font-size-12 py-1" style="font-weight: bold;">
                        {{$product->total_text}}
                    </td>

                    <td class="font-size-12 py-1" style="font-weight: bold;">

                        <i title="ویرایش" onclick="addOrEditProductInFactor({{$product->id}})" class="fa fa-edit shadow cursor-pointer border border-dark rounded bg-warning p-2 float-right"></i>

                        <form  method="post" action="{{route("customer.products-factor.delete-factor-product" , $product->id)}}" class="float-right mr-2">
                            @csrf
                            <i onclick="goToConfirmDeleteForm(this)" title="حذف" class="fa fa-trash shadow cursor-pointer border border-dark text-white rounded bg-danger p-2"></i>
                        </form>

                    </td>

                </tr>
            @endforeach

            <tr class="table-info ">
                <td colspan="3" class="font-size-12 text-center py-1">
                    جمع کل
                </td>
                <td colspan="3" class="font-size-lg font-bold text-center py-1" style="font-weight: bold;">
                    {{$totalPriceText}}
                </td>
            </tr>

            </tbody>
        </table>
    </div>



    <section class="row mt-2 mx-2">


        <section class=" col-5">
            <a href="{{route("customer.create-factor.index")}}" class="btn btn-info text-white   p-1 m-0 m-2 shadow text-center font-size-md  border border-dark text-decoration-none text-hover-white  px-2 font-weight-bold font-size-md float-right">
                مرحله قبل
                <i class="fa fa-arrow-right mr-1 border   border-white  rounded p-1"></i>
            </a>
        </section>


        <section class="col-2"></section>


        <section class="col-5">

            @if(sizeof($products)>0)
                <a href="{{route("customer.products-factor.go-to-next-step-process")}}" class="btn btn-info text-white   p-1 m-0 m-2 shadow text-center font-size-md  border border-dark text-decoration-none text-hover-white  px-2 font-weight-bold font-size-md float-left">
                    مرحله بعد
                    <i class="fa fa-arrow-left mr-1 border   border-white  rounded p-1"></i>
                </a>
            @else
                <p class="rounded bg-danger text-right text-white mb-1 font-weight-bold px-2">
                    <i class="fa fa-exclamation-circle py-1 ml-2"></i>
                    برای ادامه فرایند، حداقل باید یک محصول در لیست شما موجود باشد
                </p>
            @endif


        </section>


    </section>


</section>