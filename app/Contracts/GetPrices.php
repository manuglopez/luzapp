<?php
declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Support\Facades\Date;

interface GetPrices
{
    public function getPrices(
        Date $starDate = null,
        Date $endate = null
    );
}
