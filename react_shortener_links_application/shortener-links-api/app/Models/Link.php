<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected  $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clicks()
    {
        return $this->hasMany(LinkCounter::class);
    }
}
