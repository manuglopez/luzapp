<div class="flex items-center justify-center">
    @if ($priceNow === 0.0)
        <div class="flex h-screen flex-col items-center justify-center">
            <h1 class="mb-2 text-4xl font-semibold text-gray-900">Precio Luz Ahora </h1>
            <p class="mb-1 text-gray-900">Hora : {{Carbon\Carbon::now()->format('H:i:s')}}</p>
            <div class="pt-26 font-weight-bolder text-4xl tracking-widest text-red-700">No hay datos disponibles ahora mismo</div>
        </div>

    @else
        <div class="flex flex-col items-center justify-center">

            <h1 class="mb-2 text-4xl font-semibold text-gray-900">Precio Luz Ahora </h1>
            <p class="mb-1 text-gray-900">Hora : {{Carbon\Carbon::now()->format('H:i:s')}}</p>

            <div class="flex h-32 w-max items-center justify-center">
                <div
                    class="text-6xl font-extrabold tracking-widest p-4 animate-pulse absolute inline-flex rounded-md  opacity-75 {{$this->getColors($priceNow)}}"> {{$priceNow}}</div>
            </div>
            <!-- Injecting radial gauge -->
            <livewire:gauge wire:key="autoKey" :min-price="$minPrice" :max-price="$maxPrice" :priceNow="$priceNow"/>
            <livewire:price-on-date wire:key="autoKey"/>

        </div>
    @endif
</div>
