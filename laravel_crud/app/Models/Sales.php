<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function seller() {
        return $this->belongsTo(Seller::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}


