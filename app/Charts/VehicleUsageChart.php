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

        $permissions = Permission::selectRaw('MONTH(created_at) as monthly, COUNT(*) as count')->whereYear('created_at', date('Y'))->groupBy('monthly')->orderBy('monthly')->get();

        $labels = [];
        $data = [];

        foreach ($permissions as $permission) {
            $month = $permission->monthly;
            $count = 0;


            if ($month == $permission->monthly) {
                $count = $permission->count;
            }

            array_push($labels, date('F', mktime(0,0,0,$month,1)));  
            array_push($data, $count);
        }




     return $this->chart->barChart()
            ->setTitle('Monthly Vehicle Usage')
            ->setSubtitle('from all offices and vehicles | Month (X) Total Usage (Y)')
            ->addData('Car Used', $data)
            ->setXAxis($labels);
    }
}
