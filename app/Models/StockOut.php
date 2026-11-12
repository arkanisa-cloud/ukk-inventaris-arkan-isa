<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class stockOut extends Model
{
    protected $fillable = ['item_id', 'quantity', 'recipent', 'date', 'description'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
