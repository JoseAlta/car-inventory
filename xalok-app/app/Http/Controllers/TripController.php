<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Trip;
use App\Http\Requests\TripRequest;
use App\Models\Vehicle;

/**
 * Class TripController
 * @package App\Http\Controllers
 */
class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $trips = Trip::paginate();
        $trips = Trip::with('driver', 'vehicle')->get();
        $trip = Trip::with('driver', 'vehicle')->get();
        return view('trip.index', compact('trips','trip'))
            ->with(5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trip = new Trip();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('trip.create', compact('trip','drivers','vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TripRequest $request)
    {
        Trip::create($request->validated());

        return redirect()->route('trips.index')
            ->with('success', 'Trip created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $trip = Trip::find($id);

        return view('trip.show', compact('trip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $trip = Trip::find($id);

        return view('trip.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TripRequest $request, Trip $trip)
    {
        $trip->update($request->validated());

        return redirect()->route('trips.index')
            ->with('success', 'Trip updated successfully');
    }

    public function destroy($id)
    {
        Trip::find($id)->delete();

        return redirect()->route('trips.index')
            ->with('success', 'Trip deleted successfully');
    }
}
