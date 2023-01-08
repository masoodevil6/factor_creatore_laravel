<p class="d-block text-right font-size-12 mt-3 mb-1">
    فرم ها
</p>

<section class=" border-dark border bg-dark shadow rounded cursor-pointer height-200px overflow-auto">

    @foreach($forms as $itemForm)
        <section onclick="selectForm(this)" data-id="{{$itemForm->id}}" class="item-form mx-1 my-1 text-dark border rounded py-1 px-2 shadow @if($form!=null && $itemForm->id == $form->id) bg-info @else  bg-warning @endif">
            <i class="fa @if($form!=null && $itemForm->id == $form->id) fa-check-square @else fa-square @endif"></i>
            <span class=" mr-2 font-size-md font-weight-bold">
                {{$itemForm->name}}
            </span>

            <span class="float-left ml-2 font-size-md border border-white text-dark bg-white px-2 rounded">
                @if($itemForm->active)
                    فعال
                @else
                    غیر فعال
                @endif
            </span>
        </section>
    @endforeach

</section>