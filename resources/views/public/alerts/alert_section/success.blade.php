@if(session("alert-section-success"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">

        <p class="mb-0">
            {{session("alert-section-success")}}
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="right: auto!important; left: 0;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

