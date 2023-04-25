<div class="-mt-5">
    <canvas id="lineChart" height="250" width="350"></canvas>
</div>
@push('scripts')

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
