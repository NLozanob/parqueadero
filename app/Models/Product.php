<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;
    protected $table= 'products';
    protected $fillable= ['name','description','price','expiry_date','quantity','image', 'status'];
    protected $guarded= ['id','status','registerby','created_at','updated_at'];

    public function orderdetail(){
    return $this->hasMany(OrderDetail::class);
    }
}