<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    use HasFactory;
    protected $table= 'orders';
    protected $fillable= ['product_id','customer_id','date','value', 'status', 'route'];
    protected $guarded= ['id', 'status', 'route', 'registerby','created_at','updated_at'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}