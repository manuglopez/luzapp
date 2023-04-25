<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;

trait Utilities
{
    public function autoKey()
    {
        $randStr=Str::random(16);
        return md5($randStr);
    }
}
