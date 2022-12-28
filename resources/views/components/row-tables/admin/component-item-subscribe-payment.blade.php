<tr >
    <td class="font-size-12 ">
        {{$subscribePaymentKey}}
    </td>
    <td class="font-size-12">
        {{$subscribePaymentTitle}}
    </td>
    <td class="font-size-12">
        {{$subscribePaymentUser}}
    </td>
    <td class="font-size-12">
        {{persianPriceFormat($subscribePaymentAmount)}}
        تـومان
    </td>
    <td class="font-size-12">
        {{$subscribePaymentResNum}}
    </td>
    <td class="font-size-12">
        {{$subscribePaymentStatus["title"]}}
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.subscribes.subscribe-payment.destroy" , $subscribePaymentId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.subscribes.subscribe-payment.edit" , $subscribePaymentId)'/>

        <x-fields.component-button
                btn-type='custom'
                btn-icon='fa fa-eye'
                title="مشاهده"
                :url='route("admin.subscribes.subscribe-payment.show" , $subscribePaymentId)'/>

    </td>
</tr>