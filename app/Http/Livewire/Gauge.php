<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Gauge extends Component
{
    use Utilities;
    public float $minPrice, $maxPrice,$priceNow;
    public function mount($minPrice,$maxPrice,$priceNow):void
    {
        $this->minPrice=$minPrice;
        $this->maxPrice=$maxPrice;
        $this->priceNow=$priceNow;
    }
    public function render()
    {
        return view('livewire.gauge');
    }
}
