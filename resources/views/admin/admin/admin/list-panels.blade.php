@extends("admin.layouts.master")
@section("titlePage" , "ادمین- دسترسی ها پنل")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0">
        <section class="main-body-container col-12 my-2">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.panel.admin.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom row">

                <x-fields.component-row-data
                        title='پنل'
                        col='col-12'
                        :value='$admin->title'/>

            </section>




            <section class="mt-2">

                <p class="d-block text-white text-center py-1 font-size-12" style="background-color: grey">
                    دسترسی ها
                </p>

                <x-fields.component-from-data
                        :action='route("admin.panel.admin.storePanels" , $admin["id"])'>


                    @foreach($panels As $itemGroupPanel)

                        <section class="row  col-11 p-0 mx-auto mt-4 border border-success ">

                            <p class="col-12 text-center py-1 font-size-12 text-white bg-info border-bottom border-success">
                                {{$itemGroupPanel["panel_group"]["title"]}}
                            </p>


                            @foreach($itemGroupPanel["panels"] As $itemPanel)

                                <label for="panel-{{$itemPanel["id"]}}" class="pb-2 border-bottom row col-12 py-1 px-0 m-0">
                                    <input name="panels[]" value="{{$itemPanel["id"]}}" id="panel-{{$itemPanel["id"]}}" @if(isset($itemPanel["access"])&&$itemPanel["access"]) checked @endif type="checkbox" class="col-lg-2">
                                    <span class="pr-3 col-lg-6">
                                        {{$itemPanel["name"]}}
                                    </span>
                                </label>

                            @endforeach

                        </section>

                    @endforeach



                </x-fields.component-from-data>




            </section>

        </section>
    </section>

@endsection