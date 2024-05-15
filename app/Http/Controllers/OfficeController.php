<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index() {
        $datas = Office::all();

        return view('pages.office.index', compact('datas'));
    }

    public function show($id) {
        $data = Office::find($id);
        $dataVehicle = Vehicle::where('office_id', $id)->get();
        return view('pages.office.show-office', compact('data', 'dataVehicle'));
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

    public function edit($id) {
        $office = Office::findOrFail($id);
        return view('pages.office.edit-office', compact('office'));
    }

    public function update(Request $request, $id) {
        $data = $request->input();
        $office = Office::findOrFail($id);
        $office->update($data);

        return redirect('/office');
    }

    public function delete($id){
        $office = Office::find($id);
        $office->delete();
        return redirect('/office');
    }

}
