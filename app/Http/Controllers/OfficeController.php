<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index() {
        $datas = Office::all();

        return view('dashboard', compact('datas'));
    }

}
