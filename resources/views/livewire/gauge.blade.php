<div>
    <canvas class="mt-8" id="gauge"></canvas>
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
@endpush
