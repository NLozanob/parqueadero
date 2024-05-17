<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'date',
        'status',
        'registered_by',
        'value',
    ];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}