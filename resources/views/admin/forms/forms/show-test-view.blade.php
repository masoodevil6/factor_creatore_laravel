<section>

    <style>
        #formPdf{
            @if($orientation == "p")
                width: {{$size["width"]}}!important;
                height: {{$size["height"]}}!important;
            @else
                width: {{$size["height"]}}!important;
                height: {{$size["width"]}}!important;
            @endif
            display: table;
            margin: auto;
        }

        .page{
            @if($orientation == "p")
                 height: {{$size["height"]}}!important;
            @else
                 height: {{$size["width"]}}!important;
            @endif
            border: solid 1px black;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }

        #info-pager{
            display: none;
        }

    </style>


    <section style="display: block; border: solid 1px black; border-radius: 5px; margin-bottom: 5px;">

        <a href="{{route("admin.forms.form.test-file" , $form->id)}}" style="font-size: 12px;padding: 0.25rem 0.5rem; line-height: 1.5; border-radius: 0.2rem; color: #fff; background-color: #28a745; border-color: #28a745;text-decoration: none;cursor: pointer; display: inline-block; margin: 5px">
            فایل تست
        </a>

    </section>

    <section id="formPdf">
        {!! $view !!}
    </section>


</section>