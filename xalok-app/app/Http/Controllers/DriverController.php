<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\DriverRequest;

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
