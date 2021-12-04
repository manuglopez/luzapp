<?php

namespace App\Http\Livewire;

use App\Models\Price;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TiempoReal extends Component
{
    public Collection $prices;
    public float $minPrice;
    public float $maxPrice;
    public float $averagePrice;
    public float $priceNow;
    public float $firstQuarter;
    public float $mediumPrice;
    public float $thirdQuarter;



    public function mount()
    {

        $this->priceNow= Price::now()->toArray()[0]['value']/1000;
        $this->prices = Price::today();

        $this->minPrice = round($this->prices->min('value')/1000, 4);

        $this->maxPrice = round($this->prices->max('value')/1000, 4);

        $this->mediumPrice=($this->maxPrice+$this->minPrice)/2;
        $this->firstQuarter=($this->minPrice+$this->mediumPrice)/2;
        $this->thirdQuarter=($this->maxPrice+$this->mediumPrice)/2;

        $this->averagePrice = round($this->prices->avg('value')/1000, 4);

    }
    public function render()
    {

        return view('livewire.tiempo-real')->layout('layouts.guest');
    }

    public function getColors($value):string {
        return match (true) {
            $value <=$this->firstQuarter => 'bg-green-400 text-red-500',
            $value <=$this->mediumPrice => 'bg-yellow-300 text-red-600',
            $value <=$this->thirdQuarter => 'bg-yellow-500 text-red-700',
            $value <= $this->maxPrice => 'bg-red-600 text-white',
            default => 'default bg-red-600 text-white',

        };

    }
}
