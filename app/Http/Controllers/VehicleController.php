<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index() {
        $datas = Vehicle::all();
        return view('pages.vehicle.index', compact('datas'));
    }

    public function show($id) {
        $data = Vehicle::find($id);
        return view('pages.vehicle.show-vehicle', compact('data'));
    }

    public function create() {
        $datas = Office::all();
        return view('pages.vehicle.create-vehicle', compact('datas'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $gasPrice = $request['gas_consumption'] * 10000;

        // $data['gas_consumption'] += $request['gas_consumption'];
        // $data['total_gas_price'] += $request['total_gas_price'];
        $data['total_gas_price'] = $gasPrice;
        $office = Office::find($request->office_id);

        Vehicle::create($data);
        $office->vehicle_owned += 1;
        $office->save();

        return redirect('/vehicle');
    }

    public function edit($id) {
        $vehicle = Vehicle::find($id);
        $datas = Office::all();


        return view('pages.vehicle.edit-vehicle', compact('vehicle', 'datas'));
    }

    public function update(Request $request, $id) {
        $vehicle = Vehicle::find($id);
        $oldGasPrice = $vehicle->total_gas_price;
        $data = $request->all();
        $gasPrice = $request['gas_consumption'] * 10000;
        $data['total_gas_price'] = $gasPrice + $oldGasPrice;
        $data['gas_consumption'] = $vehicle->gas_consumption + $request['gas_consumption'];


        $vehicle->update($data);

        return redirect('/vehicle');
    }
}
