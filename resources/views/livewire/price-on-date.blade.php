<div class="flex h-full w-screen flex-col items-center justify-center">
    <label>
        Fecha:
        <input type="date" onchange="refresh(value)" name="fecha"
               value="{{\Carbon\Carbon::today()->format('Y-m-d')}}" min="{{$minDate}}"
               max="{{$maxDate}}">
    </label>
    <script>
        function refresh(val) {

            Livewire.emit('refreshPricesOnDate', val)

        }
    </script>
    <livewire:min-max wire:key="$this->autoKey()"
                      :minPrice="$minPrice"
                      :averagePrice="$averagePrice"
                      :maxPrice="$maxPrice"/>
    <livewire:line-chart :prices="$prices" wire:key="$this->autokey()"/>
    <livewire:prices-table wire:key=" $this->autoKey()"
                           :prices="$prices"
                           :firstQuarter="$firstQuarter"
                           :mediumPrice="$mediumPrice"
                           :thirdQuarter="$thirdQuarter"
                           :max-price="$maxPrice"/>
</div>
