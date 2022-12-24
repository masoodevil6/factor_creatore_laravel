<tr   title="@if($commentSeen==1){{"دیده شده"}}@else {{"دیده نشده"}}@endif">
    <td class="font-size-12 @if($commentSeen==1) bg-success text-white @endif ">
        {{$commentKey}}
    </td>
    <td class="font-size-12">
        {{$commentBody}}
    </td>
    <td class="font-size-12">
        @if($commentParent == null)
            -
        @else
            <a href="{{$commentParentUrl}}" title="{{$commentParentTitle}}">
                {{$commentParentId}}
            </a>
        @endif
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.user.comments.status" , $commentId)'
                :value='$commentStatus'/>
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='تاییدیه'
                title-en='approved'
                :url='route("admin.user.comments.approved" , $commentId)'
                :value='$commentApproved'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.user.comments.destroy" , $commentId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.user.comments.edit" , $commentId)'/>

        @if($commentParent == null)
            <x-fields.component-button
                    btn-type='custom'
                    btn-icon="fa fa-commenting"
                    title='پاسخ'
                    :url='route("admin.user.comments.adminAnswer" , $commentId)'/>
        @endif


    </td>
</tr>