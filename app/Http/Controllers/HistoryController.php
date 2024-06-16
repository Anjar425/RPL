<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $years = History::selectRaw('YEAR(date) as year')
            ->groupBy('year')
            ->pluck('year');
        $selectedYear = $request->input('year', date('Y'));

        $histories = History::whereYear('date', $selectedYear)
                            ->orderBy('date', 'ASC')
                            ->get();

        $data = $this->prepareChartData($histories);

        return view('AdminCashier.History.index', compact('data', 'selectedYear', 'years'));
    }

    private function prepareChartData($histories)
    {
        $months = [];
        $income = [];
        $expenses = [];

        foreach ($histories as $history) {
            $month = Carbon::parse($history->date)->format('M');
            if (!in_array($month, $months)) {
                $months[] = $month;
                $income[$month] = 0;
                $expenses[$month] = 0;
            }

            if ($history->type == 'In') {
                $income[$month] += $history->amount * $history->price;
            } elseif ($history->type == 'Out') {
                $expenses[$month] += $history->amount * $history->price;
            }
        }

        $datasets = [
            [
                'label' => 'Income',
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                'borderColor' => 'rgba(54, 162, 235, 1)',
                'borderWidth' => 1,
                'data' => array_values($income),
            ],
            [
                'label' => 'Expenses',
                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                'borderColor' => 'rgba(255, 99, 132, 1)',
                'borderWidth' => 1,
                'data' => array_values($expenses),
            ],
        ];

        return [
            'months' => $months,
            'datasets' => $datasets,
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }
}
