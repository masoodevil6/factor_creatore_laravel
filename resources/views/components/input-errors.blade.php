@error($field)
@foreach($errors->get($field) As $itemError)
    <p class="alert text-white bg-danger mt-2 px-3 py-1 rounded font-size-12" role="alert">
        <strong>
            {{$itemError}}
        </strong>
    </p>
@endforeach
@enderror