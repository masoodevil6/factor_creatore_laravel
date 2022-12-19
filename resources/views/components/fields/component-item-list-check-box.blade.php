<section class="col-md-3 ">

    <label>
        <input type="checkbox" class="float-right input-permission" name="{{$titleEn}}[]" value="{{$value}}" @if(in_array($value , $arrayValue)) checked @endif />
        <span class="float-right pr-2">
            {{$titleFa}}
        </span>
    </label>


    @error($titleEn.".".$key)
    @foreach($errors->get($titleEn.".".$key) As $itemError)
        <p class="alert text-white bg-danger mt-2 px-3 py-1 rounded font-size-12" role="alert">
            <strong>
                {{$itemError}}
            </strong>
        </p>
    @endforeach
    @enderror


</section>