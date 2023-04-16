<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Shopping_cart_item extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'shopping_cart_id',
        'product_id',
        'quantity'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
