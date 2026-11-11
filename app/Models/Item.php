<?php

namespace App\Models;

use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $fillable = ['code', 'name', 'quantity', 'category_id', 'location_id', 'description', 'condition'];


    public function stockIns(): HasMany
    {
        return $this->hasMany(StockInController::class);
    }

    public function stockOuts(): HasMany
    {
        return $this->hasMany(StockOutController::class);
    }
}
