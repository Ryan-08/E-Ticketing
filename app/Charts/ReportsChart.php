<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class ReportsChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['First', 'Second', 'Third', 'Second', 'Third', 'Second', 'Third', 'Second', 'Third'])
            ->dataset('Sample', [1, 120, 3, 10, 2, 30, 60, 22, 3])
            ->dataset('Sample 2', [3, 20, 11, 2, 100, 2, 1]);
    }
}