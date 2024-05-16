<?php

namespace App\Http\Controllers;

use App\Charts\VehicleUsageChart;
use App\Exports\UsageExport;
use App\Models\Permission;
use App\Models\PermissionHistory;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class DashboardController extends Controller
{
    public function index(VehicleUsageChart $chart) {
        $vehicles = Vehicle::where('is_taken', 'false')->get();
        $history = PermissionHistory::all();
        $allVehicles = Vehicle::all();
        $monthlyCounts = Vehicle::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('count(*) as count')
        )
        ->groupBy('month')
        ->get();
        $pendingPermissions = Permission::where('status', 'pending')->get();
        $currentOffice = Auth::user()->office->name;

        return view('dashboard', compact('vehicles', 'currentOffice', 'pendingPermissions', 'allVehicles', 'monthlyCounts', 'history'), ['chart' => $chart->build()]);
    }

    public function export() {
        $currentMonth = Carbon::now()->format('F');
        return Excel::download(new UsageExport,'car_usage'.'_'.$currentMonth.'.xlsx');
    }
}
