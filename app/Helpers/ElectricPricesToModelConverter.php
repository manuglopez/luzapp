<?php
declare(strict_types=1);

namespace App\Helpers;

use App\Contracts\GetPrices;
use App\Models\Price;
use Exception;


class ElectricPricesToModelConverter
{

    public mixed $indicatorData;


    /**
     * @throws JsonException
     */
    public function __construct(GetPrices $indicatorData)
    {
        $prices= $indicatorData->getPrices();

        if ($prices !== null){
            $this->indicatorData = json_decode($prices, true, 512, JSON_THROW_ON_ERROR);

        }

    }


    public function __invoke(): bool
    {
        $precios = $this->indicatorData['indicator']['values'];

        try {
            foreach ($precios as $precio) {
                Price::make($precio)->save();

            }
        } catch (Exception $e) {

            if ($e->errorInfo[0] === '23000') {
                echo "Error:{$e->errorInfo[0]} Precios ya importados";
            }
            return false;
        }

        return true;
    }
}
