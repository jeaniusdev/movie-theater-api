<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function generate(date $calendar_date) : bool {
        $param = request()->get('date');

        if(!isset($param)) {
            return false;
        }
    }
}
