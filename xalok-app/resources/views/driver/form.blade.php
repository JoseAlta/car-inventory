<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $driver?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="surname" class="form-label">{{ __('Surname') }}</label>
            <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname', $driver?->surname) }}" id="surname" placeholder="Surname">
            {!! $errors->first('surname', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="license_required" class="form-label">{{ __('Licenserequired') }}</label>
            <input type="text" name="licenseRequired" class="form-control @error('licenseRequired') is-invalid @enderror" value="{{ old('licenseRequired', $driver?->licenseRequired) }}" id="license_required" placeholder="Licenserequired">
            {!! $errors->first('licenseRequired', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>