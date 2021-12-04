<div>
    {{$date}}

    <form wire:change="getPricesOnDate(date.value)">


        <label for="date">Event Date</label>
        <x-date-picker wire:model="date" id="date"/>

        <button>Ver precios</button>
    </form>
    @foreach($prices as $price)
        <div class="mt-1 block"> {{$price->geo_name }}  {{$price->value/1000}}</div>
    @endforeach
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    @endpush

</div>
