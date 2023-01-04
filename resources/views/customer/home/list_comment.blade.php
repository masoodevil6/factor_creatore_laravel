@if(sizeof($comments) > 0 || Auth::check())
    <p class="border-bottom font-weight-bold my-2 mt-4">
        نظرات
    </p>
@endif

@auth
    <form id="send-comment" method="post" action="#" class="d-block text-dark m-0 p-0 border border-dark my-2 w-100 m-0 shadow bg-white font-size-md cursor-pointer pb-1">
        <p  class="font-size-lg border-bottom border-dark col-12 color-family-1 text-white px-2 p-1 m-0 ">
            ارسال نظر جدید توسط:
            <span class="font-weight-bold mr-2">
                {{auth()->user()->fullName}}
            </span>
        </p>

        <section class="col-12 m-2 ">
            <div class="mb-3">
                <label for="bodyCommentClient" class="form-label">متن نظر</label>
                <textarea name="body" class="form-control none-resizable-textarea"  id="bodyCommentClient" rows="2"></textarea>
            </div>

            <button type="submit" class="p-1 m-0  text-center btn btn-info font-size-md  border border-dark text-hover-white  justify-content-start">
                ثبت نظر
                <i class="fa fa-send mr-1"></i>
            </button>
        </section>

    </form>
@endauth

<section id="comments">
    @foreach($comments->list As $itemComment)
        <section class="d-block text-dark m-0 p-0 border border-dark my-2 w-100 m-0 shadow bg-white  cursor-pointer pb-1">
            <section class="row border-bottom border-dark col-12 color-family-1 text-white px-2 p-1 m-0">
                <section class="col-12 col-lg-8  ">
                    <p class="mb-1 font-size-md">
                        {{$itemComment["parent"]["user"]}}
                    </p>
                    <p class="mb-0 font-size-sm">
                        {{$itemComment["parent"]["created_at"]}}
                    </p>
                </section>
                <section class="col-12 col-lg-4">

                </section>
            </section>

            <section class="my-1 mx-2 font-size-md">
                {{$itemComment["parent"]["body"]}}
            </section>


            @if(!empty($itemComment["answer"]))

                <section class="text-dark p-0 border border-dark m-2  shadow bg-white  cursor-pointer pb-1">
                    <section class="row border-bottom border-dark col-12 color-family-1 text-white px-2 p-1 m-0">
                        <section class="col-12 ">
                            <p class="mb-1 font-size-md">
                                پاسخ
                            </p>
                        </section>
                    </section>

                    <section class="my-1 mx-2 font-size-md">
                        {{$itemComment["answer"]["body"]}}
                    </section>

                </section>

            @endif

        </section>
    @endforeach

    <x-row-tables.admin.component-pageinate-panels
            :list="$comments"
            extra-url="#comments"/>
</section>










