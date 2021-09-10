<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Tiket;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsChart extends BaseChart
{
    public ?string $name = 'reports_chart';

    public ?string $routeName = 'reports_chart';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {               
        $show = $request->show;
        $graph = getGraph($data = $show, $role = $request->role, $id = $request->id);
        // dd($graph[1]);          
        if($graph != null){
            return Chartisan::build()
            ->labels($graph[0])
            ->dataset('open', $graph[1])
            ->dataset('close', $graph[2])
            ->dataset('pending', $graph[3]);
        }                
        return Chartisan::build()
            ->labels([$show, "sample","sample","sample",])
            ->dataset('open', [0, 1, 2, 3]); 
    }
}