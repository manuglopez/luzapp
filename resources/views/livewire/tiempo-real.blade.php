<div class="flex items-center  justify-center">
    <div class="flex flex-col items-center justify-center   ">
        <h1 class="mb-2 text-4xl  text-gray-900 font-semibold">Precio Luz Ahora </h1>
        <p class="text-gray-900 mb-1">Hora : {{Carbon\Carbon::now()->format('H:i:s')}}</p>

        <div class=" flex items-center justify-center  h-32 w-max">
            <div
                class="text-6xl font-extrabold tracking-widest p-4 animate-pulse absolute inline-flex rounded-md  opacity-75 {{$this->getColors($priceNow)}}"> {{$priceNow}}</div>
        </div>
    {{--@foreach($prices as $price)
        <div class="mt-1 block"> {{$price->geo_name }}  {{$price->value/1000}}</div>
    @endforeach--}}
    <!-- Injecting radial gauge -->
        <div class="flex flex-col items-center justify-center  w-screen h-full">
            <div class="">
                <canvas class="mt-8" id="gauge"></canvas>
            </div>
            <div class="flex flex-col md:flex-row p-5 mt-3 mb-3">
                {{--precio minimo--}}
                <div class="bg-white m-2 overflow-hidden shadow rounded-t-xl text-center divide-y divide-gray-200">
                    <div class=" bg-pink-900 text-2xl text-white tracking-wide  px-4 py-5 sm:px-6">
                        Precio min
                    </div>
                    <div class="px-4 py-5 sm:p-6 flex flex-row bg-green-300">
                        <span class="inline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
</svg>
                        </span>
                        <span class="inline text-2xl text-green-700">
                            {{$minPrice}}
                        </span>

                    </div>
                </div>
                {{--precio medio--}}
                <div class="bg-white m-2 overflow-hidden shadow rounded-t-xl text-center divide-y divide-gray-200">
                    <div class=" bg-pink-900 text-2xl text-white tracking-wide  px-4 py-5 sm:px-6">
                        Precio Medio
                    </div>
                    <div class="text-2xl bg-yellow-200 px-4 py-5 sm:p-6">
                        {{$averagePrice}}
                    </div>
                </div>
                {{--precio Max--}}
                <div class="bg-white m-2 overflow-hidden shadow rounded-t-xl text-center divide-y divide-gray-200">
                    <div class=" bg-pink-900 text-2xl text-white tracking-wide  px-4 py-5 sm:px-6">
                        Precio Max
                    </div>
                    <div class="px-4 py-5 sm:p-6 flex flex-row bg-red-300">
                        <span class="text-red-800 inline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
</svg>
                        </span>
                        <span class="text-2xl inline">{{$maxPrice}} </span>
                    </div>
                </div>
            </div>
            <div class="-mt-5">
                <canvas id="lineChart" height="250" width="350"></canvas>
            </div>
        </div>


        @push('scripts')
            <script src="//cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.1.7/radial/gauge.min.js"></script>

            <script>
                let minprice = parseFloat({{$minPrice}})
                let maxprice = parseFloat({{$maxPrice}})
                let mediumprice = (minprice + maxprice) / 2
                let firstquarter = (minprice + mediumprice) / 2
                let thirdquarter = (mediumprice + maxprice) / 2

                let gauge = new RadialGauge({
                    renderTo: 'gauge',
                    width: 300,
                    height: 300,
                    units: "€ Kw/h",
                    minValue: {{$minPrice}},
                    startAngle: 90,
                    ticksAngle: 180,
                    valueBox: false,
                    value: {{$priceNow}},
                    maxValue: {{$maxPrice}},
                    majorTicks: [
                        "{{$minPrice}}",
                        "{{($minPrice + $maxPrice)/2 }}",
                        "{{$maxPrice}}",

                    ],
                    minorTicks: 4,
                    strokeTicks: true,
                    highlights: [

                        {
                            "from": minprice,
                            "to": firstquarter,
                            "color": "#34D399"
                        },
                        {
                            "from": firstquarter,
                            "to": mediumprice,
                            "color": "#FCD34D"
                        },
                        {
                            "from": mediumprice,
                            "to": thirdquarter,
                            "color": "#F59E0B"

                        },
                        {
                            "from": thirdquarter,
                            "to": maxprice,
                            "color": "#DC2626"
                        },


                    ],
                    colorPlate: "#fff",
                    borderShadowWidth: 0,
                    borders: false,
                    needleType: "arrow",
                    needleWidth: 2,
                    needleCircleSize: 7,
                    needleCircleOuter: true,
                    needleCircleInner: false,
                    animationDuration: 1500,
                    animationRule: "linear"
                }).draw();
            </script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"
                    integrity="sha256-7lWo7cjrrponRJcS6bc8isfsPDwSKoaYfGIHgSheQkk=" crossorigin="anonymous"></script>
            <script>

                /*const labels = ['enero','feb','mar','abr','mayo','jun','jul'];*/
                const data = {
                    /* labels: labels,*/
                    datasets: [{
                        label: 'Precio/hora',
                        data: [
                                @foreach($prices as $price)
                            {
                                x: '{{Carbon\Carbon::parse($price->datetime)->toTimeString()}}',
                                y: {{round($price->value/1000,3)}}
                            },
                            @endforeach
                        ],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.3
                    }]
                };
                const options = {
                    responsive: true,
                };
                const config = {
                    type: 'line',
                    data: data,
                    options: options,
                };

                const ctx = document.getElementById('lineChart');
                const myChart = new Chart(ctx, config)
            </script>
        @endpush
        <div class="flex flex-col items-center content-center">
            <h1 class="text-4xl text-center  p-4 mb-4 text-gray-900">Precio KW/h Por Horas </h1>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2 bg-gray-50 text-gray-900">

                @foreach($prices as $price)

                    @php
                        $horaInicio = Carbon\Carbon::parse($price->datetime)->toTimeString();
                        $horaFin= Carbon\Carbon::parse($price->datetime)->addHour()->toTimeString()
                    @endphp

                    <div
                        class="border border-red-400 p-2 {{$this->getColors(round($price->value/1000,3))}} ">{{$horaInicio}}
                        -{{$horaFin}}</div>
                    <div class="border border-red-400 p-2">{{round($price->value/1000,3)}}</div>

                @endforeach

            </div>
        </div>
        <div>
            @php
                $date=Carbon\Carbon::now();
            @endphp

        </div>
    </div>
</div>
