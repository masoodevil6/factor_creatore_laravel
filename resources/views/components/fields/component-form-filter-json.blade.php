<section class="col-12 mb-4 ">

    <section class="row col-12  m-auto">

        <section id="formFilter{{$method}}" class="row col-12 py-1 border rounded bg-light m-0 p-0">

            <meta name="csrf-token-{{$method}}" content="{{ csrf_token() }}" />

            {{$filters}}

            <button type="button" onclick="methodFilter{{$method}}(this , '{{$url}}')" class="btn btn-success btn-sm mt-4 mx-3 font-size-12" >
                جستجو
            </button>

        </section>

        <p class="col-10  pr-2   m-0 m-auto  bg-warning">
            نتیجه جستجو
        </p>

        <section id="formResult{{$method}}" class="row col-12 p-0 m-0 pb-2  m-auto border rounded bg-white">

            {{$slot}}

        </section>

    </section>

</section>

<script>

    function methodFilter{{$method}}(element , url) {

        var formFilter = $("#formFilter{{$method}}");
        var selects = formFilter.find("select");
        var data = {};
        for (var i=0 ; i< selects.length ; i++){
            data[selects.eq(i).attr("name")] = selects.eq(i).val();
        }
        data["_token"] =  $('meta[name="csrf-token-{{$method}}"]').attr('content');

        var formResult = $(element).parent().parent().find("#formResult{{$method}}");

        $.ajax({
            url: url,
            type: "POST",
            data : data,
            success: function (res) {
                if (res["status"]){
                    formResult.html(res["view"])
                }
                else{
                    errorToast("نتیجه ای یافت نشد");
                }
            },
            error: function () {
                errorToast("نتیجه ای یافت نشد");
            }
        })
    }

</script>