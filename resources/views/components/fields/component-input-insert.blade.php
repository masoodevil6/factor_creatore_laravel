<section class="@if($full) col-12 @else col-6  @endif mt-2">

    <label for="label-for-{{$titleEn}}" class="d-block text-right font-size-12">
        {{$titleFa}}
    </label>

    <input @if(isset($methodOnChange) && $methodOnChange) onchange="changeInput{{$titleEn}}(this)" @endif id="label-for-{{$titleEn}}" name="{{$titleEn}}" type="{{$type}}" placeholder="{{$titleFa}}"  value="@if(old($titleEn)){{old($titleEn)}}@else{{$value}}@endif" class="form-control form-control-sm form-text font-size-12">

    <x-input-errors field="{{$titleEn}}"/>

</section>