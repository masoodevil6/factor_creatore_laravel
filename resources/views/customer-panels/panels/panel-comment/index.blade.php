<section id="inside-panel-view" data-panel="{{$titleEn}}">

    <link rel="stylesheet" href="{{asset("public/sweetalert/sweetalert2.css")}}">

    @include("customer-panels.panels.top-title-panel")

    <section id="form-list-user-comment">
        @include("customer-panels.panels.panel-comment.list-comments")
    </section>

    <script src="{{asset("public/sweetalert/sweetalert2.all.min.js")}}"></script>
    <script src="{{asset("public/js/delete-form.js")}}"></script>
    <script src="{{asset("customer/customer-panels/comment-panel/comment-panel.js")}}"></script>

</section>