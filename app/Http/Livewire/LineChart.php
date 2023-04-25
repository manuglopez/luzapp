<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LineChart extends Component
{
    use Utilities;
    public $prices;

    public function mouunt($prices):void
    {
        $this->prices =$prices;
    }
    public function render()
    {
        return view('livewire.line-chart');
    }
}
