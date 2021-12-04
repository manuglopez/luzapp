<?php
declare(strict_types=1);

namespace App\Helpers;

use App\Contracts\GetPrices;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;
use JsonException;

class GetReePrices implements GetPrices
{

    /**
     * @throws JsonException
     */
    public function getPrices(
        Date $startDate=null,
       Date  $endDate=null
    ): bool|string {
        $token = 'Token token=' . config('luzapp.ree_esios_token');
        $url = config('luzapp.api_base_url') . 'indicators/1001';
        if ($startDate !==null){
            $url.=urlencode("?start_date=$startDate&end_date=$endDate");
        }
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $token
        ])->get($url);

        if ($response->successful()) {
            return $response->body();
        }
        return json_encode([
            'error' => 'We have got an error getting prices'
        ], JSON_THROW_ON_ERROR);
    }
}
