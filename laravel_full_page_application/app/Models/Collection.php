<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function nfts()
    {
        return $this->hasMany(Nft::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
