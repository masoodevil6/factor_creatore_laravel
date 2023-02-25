@if($storeEmail != "")
    <tr>
        <td style="display: block; text-align: center; ">
            نظرات و درخواست های خود را به آدرس
            <span style="color: #c2e7ff ; margin: 0 0.5rem">
                {{$storeEmail}}
            </span>
            ارسال نمایید
        </td>
    </tr>
@endif
<tr>
    <td style="display: block; text-align: center; margin-top: 10px">
        با احترام
    </td>
    <td style="display: block; text-align: center; ">
        {{jalaliDate(now())}}
    </td>
</tr>

