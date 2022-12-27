<tr  title="@if($ticketFolderStatus==1){{"باز"}}@else {{"بسته"}}@endif">
    <td class="font-size-12 @if($ticketFolderStatus==1) bg-success text-white @endif ">
        {{$ticketFolderKey}}
    </td>
    <td class="font-size-12">
        {{$ticketFolderTitle}}
        [
        {{$ticketFolderNumNotSeen}}
        ]
    </td>
    <td class="font-size-12">
        {{$ticketFolderUser}}
    </td>
    <td class="font-size-12">
        {{$ticketFolderCategory}}
    </td>
    <td class="font-size-12">
        {{$ticketFolderStatusTitle}}
    </td>
    <td class="text-left font-size-12 py-2">
        @if($ticketFolderStatus == 1)
            <x-fields.component-button
                    btn-type='custom'
                    btn-icon=''
                    title="پاسخ"
                    :url='route("admin.tickets.ticket.answer" , $ticketFolderId)'/>
        @endif


    </td>
</tr>