<?php

namespace App\Jobs;

use App\Contracts\GetPrices;
use App\Helpers\ElectricPricesToModelConverter;
use App\Helpers\GetReePrices;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use JsonException;

class ImportPricesFromApiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected mixed $prices;
    protected $converter;

    /**
     * Create a new job instance.
     *
     * @return void
     *
     */
    public function __construct(GetPrices $prices, ElectricPricesToModelConverter $converter)
    {
        $this->prices= resolve (GetReePrices::class);

    }

    /**
     * Execute the job.
     *
     * @return bool
     * @throws JsonException
     */
    public function handle(): bool
    {

         return   $this->converter= (new ElectricPricesToModelConverter($this->prices))();

    }
}
