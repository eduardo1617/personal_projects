<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $dates = ['hired_at'];

    protected $guarded = [];

    public function name(): Attribute
    {
        return Attribute::get(function (){
            return $this->first_name.' '.$this->last_name;
        });
    }

    public function branches() {
        return $this->belongsToMany(Branch::class)->withTimestamps();
    }

    public function sales() {
        return $this->hasMany(Sales::class);
    }

//    public function phone(): Attribute
//    {
//        return Attribute::get(function ($value){
//            return '+505'.' '.$value;
//        });
//    }
}
