@extends('layouts.app')

@section('template_title')
    Trip
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Trip') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('trips.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Vehicle model</th>
										<th>Driver</th>
										<th>Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($trips as $trip)
                                        <tr>
                                            
											<td>{{ $trip->vehicle->model }}</td>
											<td>{{ $trip->driver->name }}</td>
											<td>{{ $trip->date }}</td>

                                            <td>
                                                <form action="{{ route('trips.destroy',$trip->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('trips.show',$trip->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('trips.edit',$trip->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {{-- {!! $trips->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
