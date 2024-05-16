<?php

namespace App\Charts;

use App\Models\Permission;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VehicleUsageChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        $permissions = Permission::selectRaw('month as monthly, COUNT(*) as count')
        ->whereYear('created_at', date('Y'))
        ->groupBy('monthly')
        ->orderBy('monthly')
        ->get();

    $labels = [];
    $data = [];

    foreach ($permissions as $permission) {
        $count = $permission->count;
        array_push($labels, date('F', strtotime($permission->monthly.'-01'))); // Optional: Month names for labels
        array_push($data, $count);
    }

    return $this->chart->barChart()
        ->setTitle('Monthly Vehicle Usage')
        ->setSubtitle('from all offices and vehicles | Month (X) Total Usage (Y)')
        ->addData('Car Used', $data)
        ->setXAxis($labels);
}
}
