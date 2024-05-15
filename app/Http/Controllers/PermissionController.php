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

    public function show($id) {
        $data = Permission::find($id);
        return view('pages.permission.show-permission', compact('data'));
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

    public function approve($id) {
        $carPermission = Permission::find($id);
        $carPermission->update([
            'status' => 'approved'
        ]);

        $vehicleIsTaken = Vehicle::find($id);
        $vehicleIsTaken->update([
            'is_taken' => 'true'
        ]);

        return redirect('/permission');
    }

    public function reject($id) {
        $carPermission = Permission::find($id);
        $carPermission->update([
            'status' => 'rejected'
        ]);

        return redirect('/permission');
    }
}
