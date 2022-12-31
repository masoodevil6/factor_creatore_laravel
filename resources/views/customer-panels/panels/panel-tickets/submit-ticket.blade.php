<section class="border border-dark shadow bg-white mt-lg-0 mt-2 py-1 bg-white d-flex">

    <section onclick="goBackFromSubmitTicketPanel()" class="border border-dark rounded float-right cursor-pointer shadow color-family-c-1 mx-2">
        <i class="icon-back-panel fa fa-arrow-right px-2 my-1 text-white" aria-hidden="true"></i>
    </section>

    <section id="title-verify-code-email-or-phone" class="float-right py-1 mx-2">
        ارسال تیکت جدید
    </section>

</section>

<section class=" border border-dark shadow bg-white mt-2 py-1 bg-white row p-0 m-0">

    <x-fields.component-input-insert
            title-en="title"
            title-fa="عنوان تیکت"
            value="" />

    <x-fields.component-select-options
            title-en="ticket_category_id"
            title-fa="ارسال برای بخش">

        @foreach($ticketCategory As $itemCategory)
            <option value="{{$itemCategory->id}}"> {{$itemCategory->title}} </option>
        @endforeach

            <option value="0">دیگر</option>

    </x-fields.component-select-options>

    <x-fields.component-sk-editor
            title-en="text"
            title-fa="متن تیکت"
            ck-editor="0"
            value="" />

    <section class="col-12 mt-2 pb-1 border-top border-dark gray-200">
        <button type="button" onclick="submitNewTicketClient()" class="btn-submit-data btn btn-primary btn-sm mt-1 mx-3 font-size-12" >
            ارسال
        </button>
    </section>

</section>