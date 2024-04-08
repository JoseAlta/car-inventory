<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="vehicle_id" class="form-label">{{ __('Vehicle Id') }}</label>
            <input type="text" name="vehicle_id" class="form-control @error('vehicle_id') is-invalid @enderror" value="{{ old('vehicle_id', $trip?->vehicle_id) }}" id="vehicle_id" placeholder="Vehicle Id">
            {!! $errors->first('vehicle_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="driver_id" class="form-label">{{ __('Driver Id') }}</label>
            <input type="text" name="driver_id" class="form-control @error('driver_id') is-invalid @enderror" value="{{ old('driver_id', $trip?->driver_id) }}" id="driver_id" placeholder="Driver Id">
            {!! $errors->first('driver_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date" class="form-label">{{ __('Date') }}</label>
            <input type="text" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $trip?->date) }}" id="date" placeholder="Date">
            {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>