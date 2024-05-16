<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
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
        $users = User::all();
        $vehicles = Vehicle::where('is_taken', 'false')->get();
        $currentMonth = Carbon::now()->format('F');

        return view('pages.permission.create-permission', compact('datas', 'vehicles', 'currentMonth', 'users'));
    }

    public function store(Request $request) {
        $datas = $request->input();
        Permission::create($datas);

        return redirect()->route('permission.index');
    }

    public function approve($id) {
        $carPermission = Permission::find($id);
        $carPermission->update([
            'status' => 'admin-approved'
        ]);

        $vehicleIsTaken = Vehicle::find($carPermission->vehicle_id);
        $vehicleIsTaken->update([
            'is_taken' => 'true'
        ]);

        $carPermission->history()->create([
            'status' => 'admin-approved',
            'vehicle_id' => $carPermission->vehicle_id,
        ]);


        return redirect('/permission');
    }

    public function reject($id) {
        $carPermission = Permission::find($id);
        $carPermission->update([
            'status' => 'rejected'
        ]);
        $carPermission->history()->create([
            'status' => 'rejected',
            'vehicle_id' => $carPermission->vehicle_id,
        ]);

        return redirect('/permission');
    }

    public function finalApproval($id) {
        $carPermission = Permission::find($id);
        $carPermission->update([
            'status' => 'accepted'
        ]);
        $carPermission->history()->update([
            'status' => 'accepted',
        ]);

        return redirect('/permission');
    }

    public function stopPermission($id) {
        $carPermission = Permission::find($id);
        $carPermission->vehicle->update([
            'is_taken' => 'false',
        ]);

        return redirect('/permission');
    }
}
