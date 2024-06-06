<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['customer_id', 'date', 'value', 'status', 'registered_by','route'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function orderdetail() {
        return $this->hasMany(OrderDetail::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}