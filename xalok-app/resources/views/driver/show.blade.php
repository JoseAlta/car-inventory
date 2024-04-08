@extends('layouts.app')

@section('template_title')
    {{ $driver->name ?? __('Show') . " " . __('Driver') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Driver</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('drivers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $driver->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Surname:</strong>
                            {{ $driver->surname }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Licenserequired:</strong>
                            {{ $driver->licenseRequired }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
