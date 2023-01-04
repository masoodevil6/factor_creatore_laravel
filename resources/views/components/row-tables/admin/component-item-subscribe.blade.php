<tr >
    <td class="font-size-12 ">
        {{$subscribeKey}}
    </td>
    <td class="font-size-12">
        {{$subscribeTitle}}
    </td>
    <td class="font-size-12">
        @if($subscribePrice == "")
            رایگان
        @else
            {{persianPriceFormat($subscribePrice)}}
            تومان
        @endif
    </td>
    <td class="font-size-12">
        @if(empty($subscribeDuration))
            نامحدود
        @else
            {{$subscribeDuration}}
            ماه
        @endif
    </td>
    <td class="font-size-12">
        @if(empty($subscribeDownload))
            نامحدود
        @else
            {{$subscribeDownload}}
            بار
        @endif
    </td>
    <td class="font-size-12">
        @if(empty($subscribePlay))
            نامحدود
        @else
            {{$subscribePlay}}
            بار
        @endif
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.subscribes.subscribe.status" , $subscribeId)'
                :value='$subscribeStatus'/>
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='منتخب'
                title-en='selected'
                :url='route("admin.subscribes.subscribe.selected" , $subscribeId)'
                :value='$subscribeSelected'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.subscribes.subscribe.destroy" , $subscribeId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.subscribes.subscribe.edit" , $subscribeId)'/>

    </td>
</tr>