<section class="row col-12 form-group item-property-{{$titleEn}}">

    @if($titleTag != "")
        <div class="col-5">
            <input  value="{{$title}}"  name="{{$titleEn}}[{{$key}}][{{$titleTag}}]" type="text" placeholder="عنوان" class="form-control form-control-sm form-text font-size-12">
        </div>
    @endif

    <div class="col-5">
        <input  value="{{$value}}"  name="{{$titleEn}}[{{$key}}][{{$valueTag}}]" type="text" placeholder="مقدار" class="form-control form-control-sm form-text font-size-12">
    </div>

        <button onclick="deleteItemProperty{{$titleEn}}(this)" type="button"  class="btn btn-danger  btn-sm font-size-12">
            <i class="fa fa-trash-alt"></i>
            حذف
        </button>
</section>