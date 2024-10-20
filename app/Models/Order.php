<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','status', 'city', 'quarter', 'address', 'phone'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
                    ->withPivot('quantity');
    }

    // In your Order model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
{
    return $this->hasOne(Payment::class);
}

   
}
