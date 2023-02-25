<table style="border: solid #2d3436 2px; direction: rtl;  font-size: 10pt;box-shadow: 0 0 8px #3c3c3c; font-family:Tahoma; ">

    <thead style="display:block ;border-bottom: solid white 2px;  background: #2d3436; color: white" >
    @include("emails.layouts.header")
    </thead>

    <tbody style="display:block ;background-color: #ffc107; padding-bottom: 2rem; padding-top: 1rem ; font-size: 12pt">
    @yield("content")
    </tbody>

    <tfoot style="display:block ;border-top: solid white 2px;  background: #2d3436; color: white">
    @include("emails.layouts.footer")
    </tfoot>

</table>
