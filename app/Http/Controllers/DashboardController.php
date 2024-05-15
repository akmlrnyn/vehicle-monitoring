<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $vehicles = Vehicle::where('is_taken', 'false')->get();
        $pendingPermissions = Permission::where('status', 'pending')->get();
        $currentOffice = Auth::user()->office->name;

        return view('dashboard', compact('vehicles', 'currentOffice', 'pendingPermissions'));
    }
}
