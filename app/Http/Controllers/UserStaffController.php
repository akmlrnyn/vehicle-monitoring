<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStaffController extends Controller
{
    public function index() {
        $data = Auth::user();

        return view('pages.user.index', compact('data'));
    }

    public function show() {
        $user = Auth::user();
        $permissions = Permission::where('user_id', $user->id)->get();

        return view('pages.user.permission.index', compact('permissions'));
    }

    public function create() {
        $vehicles = Vehicle::where('is_taken', 'false')->get();
        $currentMonth = Carbon::now()->format('F');

        return view('pages.user.permission.create', compact(['vehicles', 'currentMonth']));
    }

    public function store(Request $request) {
        $datas = $request->input();
        Permission::create($datas);

        return redirect('/staff-user');
    }
}
