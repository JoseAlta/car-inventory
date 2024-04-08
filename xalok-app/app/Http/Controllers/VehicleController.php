<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Requests\VehicleRequest;

/**
 * Class VehicleController
 * @package App\Http\Controllers
 */
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::paginate();

        return view('vehicle.index', compact('vehicles'))
            ->with('i', (request()->input('page', 1) - 1) * $vehicles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicle = new Vehicle();
        return view('vehicle.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request)
    {
        Vehicle::create($request->validated());

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);

        return view('vehicle.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);

        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validated());

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle updated successfully');
    }

    public function destroy($id)
    {
        Vehicle::find($id)->delete();

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle deleted successfully');
    }
}
