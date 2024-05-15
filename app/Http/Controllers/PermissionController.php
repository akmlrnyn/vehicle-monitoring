<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index() {
        $datas = Permission::all();
        return view('pages.permission.index', compact('datas'));
    }

    public function create() {
        $datas = Permission::all();
        $vehicles = Vehicle::where('is_taken', 'false')->get();
        $currentMonth = Carbon::now()->format('F');

        return view('pages.permission.create-permission', compact('datas', 'vehicles', 'currentMonth'));
    }

    public function store(Request $request) {
        $datas = $request->input();
        Permission::create($datas);

        return redirect()->route('permission.index');
    }

    // public function approve() {
    //     $permission = Permission::all();
    //     $permission['status'] = 'approved'
    // }
}
