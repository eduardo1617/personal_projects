<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sellers() {
        return $this->belongsToMany(Seller::class)->withTimestamps();
    }

    public function sales() {
        return $this->hasMany(Sales::class);
    }
}
