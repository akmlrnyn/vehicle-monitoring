<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index() {
        $datas = Office::all();

        return view('pages.office.index', compact('datas'));
    }

    public function create() {
        $datas = Office::all();
        return view('pages.office.create-office', compact('datas'));
    }

    public function store(Request $request) {
        $data = $request->input();
        Office::create($data);

        return redirect('/office');
    }

}
