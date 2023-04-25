<?php

namespace App\Http\Livewire;

use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;


class PricesComponent extends \Livewire\Component
{

    public Collection $prices;
    public float $minPrice;
    public float $maxPrice;
    public float $averagePrice;
    public float $priceNow;
    public float $firstQuarter;
    public float $mediumPrice;
    public float $thirdQuarter;
    public string $maxDate;
    public string $minDate;

    public function initialize($date=null)
    {
       if ($date){

           $this->prices =Price::indate($date);
           
       }else{
           $this->prices = Price::today();
       }

        $this->minPrice = round($this->prices->min('value') / 1000, 4);
        $this->maxPrice = round($this->prices->max('value') / 1000, 4);
        $this->mediumPrice = ($this->maxPrice + $this->minPrice) / 2;
        $this->firstQuarter = ($this->minPrice + $this->mediumPrice) / 2;
        $this->thirdQuarter = ($this->maxPrice + $this->mediumPrice) / 2;

        $this->averagePrice = round($this->prices->avg('value') / 1000, 4);


        $this->maxDate = $this->getMaxDate();
        $this->minDate = $this->getMinDate();
    }

    private function getMaxDate()
    {
        if ((int)Carbon::now()->format('His') < 210000) {
            return Carbon::today()->format('Y-m-d');
        }
        return Carbon::today()->addDay()->format('Y-m-d');

    }

    private function getMinDate(): string
    {
        return (new Price())->getMinDateInPrices();
    }

    public function getColors($value): string
    {
        return match (true) {
            $value <= $this->firstQuarter => 'bg-green-400 text-red-500',
            $value <= $this->mediumPrice => 'bg-yellow-300 text-red-600',
            $value <= $this->thirdQuarter => 'bg-yellow-500 text-red-700',
            $value <= $this->maxPrice => 'bg-red-600 text-white',
            default => 'default bg-red-600 text-white',

        };

    }
}
