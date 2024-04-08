@extends('layouts.app')

@section('template_title')
    {{ $vehicle->name ?? __('Show') . " " . __('Vehicle') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vehicle</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('vehicles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Brand:</strong>
                            {{ $vehicle->brand }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Model:</strong>
                            {{ $vehicle->model }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Plate:</strong>
                            {{ $vehicle->plate }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>License required:</strong>
                            {{ $vehicle->licenseRequired }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
