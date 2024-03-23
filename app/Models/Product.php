<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;
    protected $table= 'productos';
    protected $fillable= ['name','description','price','expiry_date','quuantity'];
    protected $guarded= ['id','created_at','updated_at'];

    public function orders(){
    return $this->hasMany(Order::class);
    }
}