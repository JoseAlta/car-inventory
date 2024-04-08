@extends('layouts.app')

@section('template_title')
    {{ $trip->name ?? __('Show') . " " . __('Trip') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Trip</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('trips.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Vehicle brand:</strong>
                            {{ $trip->vehicle->brand }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Vehicle model:</strong>
                            <a href="/vehicles/{{ $trip->vehicle->id }}">{{ $trip->vehicle->model }}</a>
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Driver name:</strong>
                            <a href="/drivers/{{ $trip->driver->id }}">{{ $trip->driver->name }}</a>
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>License required:</strong>
                            {{ $trip->driver->licenseRequired }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Date:</strong>
                            {{ $trip->date }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Created at:</strong>
                            {{ $trip->created_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
