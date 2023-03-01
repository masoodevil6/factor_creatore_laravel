<form id="form-data-group" class="form-group" action="{{$action}}" method="{{$method}}"  @if($enctype != "") enctype="{{$enctype}}" @endif >

    @csrf

    <section class="row m-auto">
        {{$slot}}
    </section>

    <button type="@if($preventSubmit == 1){{"button"}}@else{{"submit"}}@endif" @if($preventSubmit == 1) onclick="submitFormDataGroup(this)" @endif class="btn-submit-data btn btn-primary btn-sm mt-4 mx-3 font-size-12" >
        {{$btnTitle}}
    </button>

</form>