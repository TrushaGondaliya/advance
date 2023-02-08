<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Scopes\AvailableScope;

class PanelProduct extends Product
{
    use HasFactory;
    protected static function booted()
    {
        // static::addGlobalScope(new AvailableScope);
    }
}
