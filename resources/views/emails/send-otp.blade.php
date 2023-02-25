@extends("emails.layouts.master")

@section("content")
    <tr style="display: block">
        <td style="display: block; text-align: center">
            موضوع:
            <b style="margin: 0 10px">
                {{$details["title"]}}
            </b>
        </td>
        <td style="display: block; text-align: center">
            {!! $details["body"] !!}
        </td>
    </tr>

@endsection
