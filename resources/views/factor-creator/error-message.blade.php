@if(Session::has('error-template-factor'))
    <p class="alert text-white bg-danger mt-2 px-3 py-1 rounded font-size-12 border border-dark shadow" role="alert">
        <strong>
            <i class="fa fa-exclamation-circle mx-2 font-size-xlg"></i>
            {{Session::get('error-template-factor')}}
        </strong>
    </p>
@endif