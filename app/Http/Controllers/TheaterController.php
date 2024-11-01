<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theater;
use App\Models\Sale;
use Carbon\Carbon;

class TheaterController extends Controller
{
    public function index()
    {
        return $this->getTheaterSalesByDate(date('Y-m-d'));
    }
    public function show(Request $request)
    {
        return $this->getTheaterSalesByDate($request->calendar_date);
    }

    private function getTheaterSalesByDate(string $date)
    {
        $formattedDate = Carbon::parse($date)->format('F j, Y');

        $theaters = Theater::withSum(['sales' => function ($query) use ($date) {
            $query->whereDate('date', $date);
        }], 'amount')->get();

        $sales = Sale::with(['showing.movie', 'showing.theater'])->whereDate('date', $date)->get();

        if ($theaters->isNotEmpty()) {
            return view('main', ['theaters' => $theaters, 'sales' => $sales, 'date' => $date, 'formattedDate' => $formattedDate, 'message' => PrismController::genAI()]);
        }

        return view('main')->with('error', 'No data found.');
    }
}
