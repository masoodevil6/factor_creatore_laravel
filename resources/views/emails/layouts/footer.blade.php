@if($storeEmail != "")
    <tr>
        <td style="display: block; text-align: center; font-family: Tahoma;">
            نظرات و درخواست های خود را به آدرس
            <span style="color: #0f6674 ; margin: 0 0.5rem">
                {{$storeEmail}}
            </span>
            ارسال نمایید
        </td>
    </tr>
@endif
<tr>
    <td style="display: block; text-align: center; font-family: Tahoma;margin-top: 10px">
        با احترام
    </td>
    <td style="display: block; text-align: center; font-family: Tahoma;">
        {{jalaliDate(now())}}
    </td>
</tr>

