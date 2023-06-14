<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        "id_category",
        "title",
        "image",
        "price_new",
        "price_old",
        "brand"
    ];
}
