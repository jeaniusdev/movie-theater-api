<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\V1\QueryFilter;
use App\Traits\HasUuid;

class Sale extends Model
{
    use HasUuid;

    protected $guarded = [];

    public function showing()
    {
        return $this->belongsTo(Showing::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
}
