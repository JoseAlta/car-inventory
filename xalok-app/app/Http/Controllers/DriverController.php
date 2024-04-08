<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\DriverRequest;
use App\Models\Trip;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



/**
 * Class DriverController
 * @package App\Http\Controllers
 */
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::paginate();

        return view('driver.index', compact('drivers'))
            ->with('i', (request()->input('page', 1) - 1) * $drivers->perPage());
    }

    public function getDrivers(Request $request)
    {
        $fechaSeleccionada = $request->input('date');
        $vehicleId = $request->input('vehicle_id');
        $vehicle = Vehicle::where('id', $vehicleId)->first();
        // Obtener los IDs de los conductores que tienen un viaje agendado para la fecha seleccionada
        $conductoresConViaje = Trip::where('date', $fechaSeleccionada)->pluck('driver_id');
    
        Log::debug("message");
        Log::debug($conductoresConViaje);
        // Obtener los conductores cuya licencia coincide con la requerida por el vehículo seleccionado
        $conductoresConLicencia = Driver::where('licenseRequired', $vehicle->licenseRequired)->pluck('id');
        Log::debug($conductoresConLicencia);
    
        // Obtener los conductores que no están en la lista de conductores con viaje agendado y tienen la licencia adecuada
        $conductoresSinViajeYLicencia = Driver::whereNotIn('id', $conductoresConViaje)
                                                ->whereIn('id', $conductoresConLicencia)
                                                ->get();
Log::debug($conductoresSinViajeYLicencia);
    
        // Devolver los conductores como respuesta
        return response()->json($conductoresSinViajeYLicencia);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $driver = new Driver();
        return view('driver.create', compact('driver'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverRequest $request)
    {
        Driver::create($request->validated());

        return redirect()->route('drivers.index')
            ->with('success', 'Driver created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $driver = Driver::find($id);

        return view('driver.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $driver = Driver::find($id);

        return view('driver.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DriverRequest $request, Driver $driver)
    {
        $driver->update($request->validated());

        return redirect()->route('drivers.index')
            ->with('success', 'Driver updated successfully');
    }

    public function destroy($id)
    {
        Driver::find($id)->delete();

        return redirect()->route('drivers.index')
            ->with('success', 'Driver deleted successfully');
    }
}
