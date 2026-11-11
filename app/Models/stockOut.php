<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stockOut extends Model
{
    protected $fillable = ['item_id', 'quantity', 'recipent', 'date', 'description'];
}
