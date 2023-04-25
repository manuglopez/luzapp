<?php

namespace App\Console\Commands;

use App\Helpers\ElectricPricesToModelConverter;
use App\Helpers\GetReePrices;
use App\Jobs\ImportPricesFromApiJob;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class GetPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prices:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' This generate  a new Job to Synchronize electricity prices and save to database';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {

        $prices= resolve(GetReePrices::class);
        $converter = (new ElectricPricesToModelConverter($prices));
        dispatch(new ImportPricesFromApiJob($prices, $converter));


        return 0;
    }
}
