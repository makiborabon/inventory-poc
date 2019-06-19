<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['barcode', 'sku', 'title', 'description', 'price', 'image'];
}
