<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()  {
        $datas = User::all();

        return view('pages.staff.index', compact('datas'));
    }
}
