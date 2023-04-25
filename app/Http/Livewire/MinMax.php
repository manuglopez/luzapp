<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MinMax extends Component
{
    use Utilities;
    public float $minPrice, $averagePrice, $maxPrice;

    public function mount($minPrice, $averagePrice, $maxPrice): void
    {
        [$this->minPrice, $this->averagePrice, $this->maxPrice] = [$minPrice, $averagePrice, $maxPrice];
    }

    /**
     * @return Application|Factory|View
     */
    public function render(): Application|Factory|View
    {
        return view('livewire.min-max');
    }



}
