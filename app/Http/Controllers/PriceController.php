<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function precioTiempoReal(Request $request)
    {
        $pricesCollection=Price::now();


    }


}
