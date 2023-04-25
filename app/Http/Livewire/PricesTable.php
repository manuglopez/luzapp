<?php

namespace App\Http\Livewire;

class PricesTable extends PricesComponent
{
    use Utilities;
    public function render()
    {
        return view('livewire.prices-table');
    }
}
