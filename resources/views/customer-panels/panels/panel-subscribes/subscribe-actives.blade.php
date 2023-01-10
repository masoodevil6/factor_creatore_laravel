<section class="border border-dark shadow bg-white mt-2 mt-lg-0 ">

    <section class="border-bottom border-dark color-family-1 text-center text-white">
        اشتراک های فعال
    </section>

    <section id="form_list_main_tickets" class="mx-5 mx-lg-2 my-3 row ">

        @if(sizeof($subscribeActive)>0)
            @foreach($subscribeActive as $itemSubscribe)


                <section class="col-12 col-lg-6">
                    <section class="d-block m-1 border border-dark rounded p-2">

                        <p class="text-center mb-1 font-size-xlg">
                            اشتراک:
                            <span class="font-weight-bold mr-2 text-success">
                                {{$itemSubscribe->title}}
                            </span>
                        </p>

                        <section id="chart-doughnut-{{$itemSubscribe->subscribe_id}}" class="chart-doughnut d-block m-auto my-2" style="height: 175px; width: 100%;"></section>

                        <p class="text-center mb-1 font-size-xlg">
                            <span class="text-success font-weight-bold">
                                {{$itemSubscribe->now_to_end}}
                                روز
                            </span>
                            <span class="mx-2">
                                /
                            </span>
                            <span class="text-info font-weight-bold">
                                {{$itemSubscribe->start_to_end}}
                                روز
                            </span>
                        </p>

                    </section>
                </section>


                <script>

                    $(document).ready(function () {
                        var chart = new CanvasJS.Chart("chart-doughnut-{{$itemSubscribe->subscribe_id}}", {
                            animationEnabled: true,
                            data: [{
                                indexLabelPlacement: "inside",
                                type: "doughnut",
                                startAngle: 270,
                                indexLabelFontSize: 17,

                                indexLabel: " ",
                                dataPoints: [
                                    { y: {{$itemSubscribe->start_to_now}}  , label: "روز [صرف شده]" , color: "#dc3545" },
                                    { y: {{$itemSubscribe->now_to_end}} , label: "روز [باقی مانده]"  , color: "#28a745" }
                                ]
                            }]
                        });
                        chart.render();
                    })
                </script>

            @endforeach
        @else

            <section class="col-12">

                <x-component-not-exist-item
                        title="اشتراک فعالی"/>

            </section>
        @endif


        <section class="col-12">

            <a href="{{route("customer.subscribes.list")}}"  class="float-left font-size-md btn btn-success rounded  text-white text-center mt-2 py-1 shadow">
                خرید اشتراک
            </a>

        </section>
    </section>
</section>