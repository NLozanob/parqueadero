<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model {
    use HasFactory;
    protected $table = 'orderdetails';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'subtotal', 'registerby'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}