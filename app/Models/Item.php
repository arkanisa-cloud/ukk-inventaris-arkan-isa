<?php

namespace App\Models;

use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $fillable = ['code', 'name', 'quantity', 'category_id', 'location_id', 'description', 'condition'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
    
    public function stockIns(): HasMany
    {
        return $this->hasMany(StockInController::class);
    }

    public function stockOuts(): HasMany
    {
        return $this->hasMany(StockOutController::class);
    }
}
