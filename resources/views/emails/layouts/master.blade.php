<table style="border: solid grey 2px; direction: rtl; border-radius: 10px; font-size: 12pt;box-shadow: 0 0 8px #3c3c3c;">

    <thead style="display:block ;border-bottom: solid grey 2px;  background: #E3F2FD;" >
    @include("emails.layouts.header")
    </thead>

    <tbody style="display:block ;background-color: white; padding-bottom: 2rem; padding-top: 1rem">
    @yield("content")
    </tbody>

    <tfoot style="display:block ;border-top: solid grey 2px;  background: #E3F2FD;">
    @include("emails.layouts.footer")
    </tfoot>

</table>
