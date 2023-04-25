<div class="flex flex-col content-center items-center">
    <h1 class="mb-4 p-4 text-center text-4xl text-gray-900">Precio KW/h Por Horas </h1>
    <div class="grid grid-cols-2 gap-2 bg-gray-50 text-gray-900">

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
