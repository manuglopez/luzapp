<?php

namespace App\Http\Livewire;

class PriceOnDate extends PricesComponent
{

    use Utilities;

    protected $listeners = [
        "refreshPricesOnDate",
        "refreshComponent" => '$refresh',
    ];

    public function refreshPricesOnDate($date)
    {

        $this->render($date);


    }

    public function mount($date = null)
    {

        $this->initialize($date);
    }

    public function render($date=null)
    {
        $this->initialize($date);
        return view('livewire.price-on-date');
    }
}
