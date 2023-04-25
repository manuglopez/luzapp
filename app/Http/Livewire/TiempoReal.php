<?php

namespace App\Http\Livewire;

use App\Models\Price;

class TiempoReal extends PricesComponent
{
    use Utilities;

    public function mount($date = null)
    {
        $this->initialize($date);
        ray(Price::now()->toArray());
        if (empty(Price::now()->toArray())) {
            $this->priceNow = 0.0;
        } else {
            $this->priceNow = Price::now()->toArray()[0]['value'] / 1000;
        }


    }


    public function render()
    {

        return view('livewire.tiempo-real')->layout('layouts.guest');
    }


}
