<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Theater extends Model
{
    use HasUuid;

    protected $guarded = [];

    public function showings()
    {
        return $this->hasMany(Showing::class);
    }

    public function sales()
    {
        return $this->hasManyThrough(Sale::class, Showing::class);
    }
}
