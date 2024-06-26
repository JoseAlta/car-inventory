@extends('layouts.app')

@section('template_title')
    Vehicle
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Vehicle') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('vehicles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Brand</th>
										<th>Model</th>
										<th>Plate</th>
										<th>License required</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicles as $vehicle)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $vehicle->brand }}</td>
											<td>{{ $vehicle->model }}</td>
											<td>{{ $vehicle->plate }}</td>
											<td>{{ $vehicle->licenseRequired }}</td>

                                            <td>
                                                <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('vehicles.show',$vehicle->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('vehicles.edit',$vehicle->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $vehicles->links() !!}
            </div>
        </div>
    </div>
@endsection
