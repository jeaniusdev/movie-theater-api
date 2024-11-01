<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Movie extends Model
{
    use HasUuid;

    protected $guarded = [];
    
    public function showings()
    {
        return $this->hasMany(Showing::class);
    }
}
