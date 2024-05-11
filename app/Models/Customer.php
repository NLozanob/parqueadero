<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    use HasFactory;
    protected $table= 'customers';
    protected $fillable= ['identification_document','name','address','phone_number','email', 'image', 'status'];
    protected $guarded= ['id','status','registerby','created_at','updated_at'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}