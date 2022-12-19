<link rel="stylesheet" href="{{asset("admin/public/jalalidatepicker/persian-datepicker.min.css")}}">

<section class="col-6 mt-2">

    <label for="view-date-selected-{{$titleEn}}" class="d-block text-right font-size-12">
        {{$titleFa}}
    </label>

    <input id="date-selected-{{$titleEn}}"  name="{{$titleEn}}" type="hidden"  value="@if(old($titleEn)) {{old($titleEn)}} @else {{$value}} @endif" class="form-control form-control-sm form-text font-size-12">

    <input id="view-date-selected-{{$titleEn}}"   type="text"  value="@if(old($titleEn)) {{old($titleEn)}} @else {{$value}} @endif" class="form-control form-control-sm form-text font-size-12">

</section>

<script src="{{asset("admin/public/jalalidatepicker/persian-date.min.js")}}"></script>
<script src="{{asset("admin/public/jalalidatepicker/persian-datepicker.min.js")}}"></script>
<script>
    $(document).ready(function () {
        $("#view-date-selected-{{$titleEn}}").persianDatepicker({
            format: 'YYYY/MM/DD , HH:m',
            altField: '#date-selected-{{$titleEn}}',
            timePicker: {
                enabled: true,
                meridiem: {
                    enabled: true
                }
            }
        });
    });
</script>