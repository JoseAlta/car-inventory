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
                            <strong>Vehicle Id:</strong>
                            {{ $trip->vehicle_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Driver Id:</strong>
                            {{ $trip->driver_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Date:</strong>
                            {{ $trip->date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
