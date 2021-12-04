<?php

namespace App\Http\Livewire;


use App\Models\Price;
use Illuminate\Support\Carbon;

use Livewire\Component;

class GetPricesOnDate extends Component
{
    public $date;
    public $prices;

    public function mount()
    {
        $this->prices=Price::now();
    }
    public function render()
    {
        return view('livewire.get-prices-on-date');
    }

    public function getPricesOnDate($date)
    {
        $this->prices=Price::where('datetime','like',$date)->get();
        return $this->date =$date;
    }
}
