<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Theater;
use App\Http\Resources\V1\SaleResource;
use App\Http\Requests\Api\V1\SaleRequest;
use App\Traits\ApiResponses;
use App\Http\Filters\V1\SaleFilter;

class SaleController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     */
    public function index(SaleFilter $filters)
    {
        // return SaleResource::collection(Sale::with('showing.movie', 'showing.theater')->paginate());
        return SaleResource::collection(Sale::with('showing.movie', 'showing.theater')->filter($filters)->paginate());
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        return new SaleResource($sale);
    }

    /**
     * Display the filtered resource.
     */
    public function showSalesByDate(SaleRequest $request)
    {
        $date = $request->input('calendar_date');

        $top_theater = Theater::withSum(['sales as total_sales' => function ($query) use ($date) {
            $query->whereDate('date', $date);
        }], 'amount')
        ->orderByDesc('total_sales')
        ->first();

        if ($top_theater && $top_theater->total_sales != 0) {
            return $this->ok('Top selling movie theater on '.$date, [
                'theater_name' => $top_theater->name,
                'total_sales' => '$'.number_format($top_theater->total_sales, 2),
            ], 200);
        }

        return $this->error('No sales data found for the requested date.', 404);
    }
}
