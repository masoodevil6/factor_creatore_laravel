@if(!isset($form))

    <section class="m-2 border-danger border rounded p-2 row">
        <section class="col-4">
            <i class="fa fa-exclamation-circle font-size-xxlg text-center  text-danger d-block" aria-hidden="true"></i>
        </section>
        <p class="col-8 text-right text-danger m-0 font-weight-bold">
            ابتدا فرم نهایی فاکتور مورد نظر خود را انتخاب نمایید
        </p>

    </section>

@else

    <form action="{{route("customer.forms-factor.end-process-select-form")}}" method="post" class="border border-dark bg-white rounded mt-2 mt-lg-0">
        @csrf

        <p class="bg-dark text-white text-center font-size-lg">
            وضعیت:
            <span class="mr-2 font-weight-bold">
                 @if($form->active)
                    فعال
                @else
                    غیر فعال
                @endif
            </span>
        </p>

        <input type="hidden" name="form" value="{{$form->id}}">

        <section class="p-2  mx-3 my-2">

            @if(!empty($form["image"]))
                <?php
                    $srcImage = asset($form["image"]["indexArray"][$form["image"]["currentImage"]]);
                ?>
                <a href="{{$srcImage}}">
                    <img class="m-auto d-block " height="150" src="{{$srcImage}}" title="{{$form->image_title}}" alt="{{$form->image_alt}}"">
                </a>
            @else
                <i class="fa fa-spinner text-dark  text-center font-size-xxlg d-block py-5 line-height-40" style="height: 150px"></i>
            @endif

        </section>

        <div class="border-top mx-2 my-0 px-2 pt-1">
            {!! $infoForm["description"] !!}
        </div>

        <div class="border-top mx-2 my-0 px-2 pt-1">
            <table class="table table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="w-10  font-size-10 text-center">استاندارد</th>
                    <th scope="col" class="w-30  font-size-10 text-center">سایز</th>
                    <th scope="col" class=" font-size-10 text-center">تعداد کالاها در هر صفحه</th>
                </tr>
                </thead>

                <tbody>
                @foreach($infoForm["page"] As $key => $itemInfo)
                    <tr>
                        <td class="font-size-10">
                            {{$key + 1}}
                        </td>
                        <td class="font-size-10 text-center">
                            {{\Illuminate\Support\Str::upper($itemInfo["size"]["name"])}}
                        </td>
                        <td class="font-size-10 text-center">
                            [
                            {{$itemInfo["size"]["width"]}}
                            *
                            {{$itemInfo["size"]["height"]}}
                            ]
                        </td>
                        <td class="font-size-10 text-center">
                            {{$itemInfo["num"]}}
                            عدد
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <div class="row w-100 mx-0 border-top">

            <div class="col-8 p-0 m-0 row w-100 mx-0">

                @if($form->active)
                    <div class="col-6 p-0 m-0">
                        <label for="select-option-size" class="d-block text-right font-size-12 line-height-40 bg-secondary text-center text-white py-0 m-0">
                            سایز صفحه
                        </label>
                    </div>

                    <div class="col-6 p-0 m-0">

                        <select  id="select-option-size"  name="size" class=" form-control form-control-sm form-text font-size-12" aria-label="Default select example">
                            @foreach($infoForm["page"] As $key => $itemInfo)
                                <option value="{{$itemInfo["size"]["name"]}}">
                                    {{\Illuminate\Support\Str::upper($itemInfo["size"]["name"])}}
                                    - [
                                    {{$itemInfo["num"]}}
                                    عدد
                                    ]
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <x-input-errors field="size"/>

                @endif

            </div>

            <div class="col-4 p-0 m-0">
                <button type="submit" class="btn @if($form->active) btn-info text-white @else btn-warning text-dark @endif   p-1 m-0 my-1 mx-2 shadow text-center font-size-md  border border-dark text-hover-white  px-2 font-weight-bold font-size-md float-left">
                    @if($form->active)
                        انتخاب و ادامه
                    @else
                        خرید و فعال سازی
                    @endif
                    <i class="fa fa-check mr-1 border  @if($form->active)  border-white @else  border-dark @endif  rounded p-1"></i>
                </button>
            </div>

        </div>




    </form>

@endif