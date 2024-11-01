<?php

namespace App\Http\Filters\V1;
use App\Http\Filters\V1\QueryFilter;
use Carbon\Carbon;

class SaleFilter extends QueryFilter {
    public function date($value) {
        $formattedDate = Carbon::parse($value)->format('Y-m-d');
        return $this->builder->whereDate('date', $formattedDate);
    }
}