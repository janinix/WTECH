<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image1',
        'rating',
        'image2',
        'image3',
        'category1',
        'category2',
        'category3',
        'category4',
    ];

    public function shopping_cart_item()
    {
        return $this->belongsTo(Shopping_cart_item::class);
    }
}
