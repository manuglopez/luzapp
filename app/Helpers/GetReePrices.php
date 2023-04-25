<?php
declare(strict_types=1);

namespace App\Helpers;

use App\Contracts\GetPrices;
use Illuminate\Support\Facades\Http;

class GetReePrices implements GetPrices
{


    public function getPrices(): bool|string
    {
        $token = 'Token token=' . config('luzapp.ree_esios_token');
        $url = config('luzapp.api_base_url') . 'indicators/1001';


        ray($url);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'x-api-key' => $token
        ])->get($url);

        if ($response->successful()) {
            return $response->body();
        }
        return json_encode([
            'error' => 'We have got an error getting prices'
        ], JSON_THROW_ON_ERROR);
    }
}
