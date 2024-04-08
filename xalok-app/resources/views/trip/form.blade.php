<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div id="vehicle" class="form-group mb-2 mb20" hidden>
            <label for="vehicle_id" class="form-label">{{ __('Vehicle') }}</label>
            <select name="vehicle_id" class="form-control" id="vehicle_id">
                <!-- Options will be dynamically populated after selecting a date -->
            </select>
            {{-- <select name="vehicle_id" class="form-control @error('vehicle_id') is-invalid @enderror" id="vehicle_id">
                <option value="">Select a vehicle</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->model }}</option>
                @endforeach
            </select> --}}
            {{-- <input type="text" name="vehicle_id" class="form-control @error('vehicle_id') is-invalid @enderror" value="{{ old('vehicle_id', $trip?->vehicle_id) }}" id="vehicle_id" placeholder="Vehicle Id"> --}}
            {!! $errors->first('vehicle_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="driver_id" class="form-label">{{ __('Driver') }}</label>
            <select name="driver_id" class="form-control @error('driver_id') is-invalid @enderror" id="driver_id">
                <option value="">Select a driver</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
            {{-- <input type="text" name="driver_id" class="form-control @error('driver_id') is-invalid @enderror" value="{{ old('driver_id', $trip?->driver_id) }}" id="driver_id" placeholder="Driver Id"> --}}
            {!! $errors->first('driver_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date" class="form-label">{{ __('Date') }}</label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $trip?->date) }}" id="date" placeholder="Date">
            {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cuando se cambia la fecha
        document.getElementById('date').addEventListener('change', function() {
            // Obtener la fecha seleccionada
            var selectedDate = this.value;
            // Realizar una solicitud AJAX al servidor para obtener los conductores disponibles
            fetch('{{ route("get_vehicles") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ date: selectedDate })
        })
        .then(function(response) {
            if (!response.ok) {
                console.log(response);
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(function(data) {
            console.log("updeted",data);
            var vehicleSelect = document.getElementById('vehicle_id');
            vehicleSelect.innerHTML = '';
            var option = document.createElement('option');
                option.value = "";
                option.textContent = "Select a vehicle";
                vehicleSelect.appendChild(option);
            data.forEach(vehicle => {
                var option = document.createElement('option');
                option.value = vehicle.id;
                option.textContent = vehicle.brand + ' ' + vehicle.model;
                vehicleSelect.appendChild(option);
            });
            var vehicledom = document.getElementById('vehicle');
    
            vehicledom.removeAttribute('hidden');
            
        })
        });

        document.getElementById('vehicle_id').addEventListener('change', function() {
            // Obtener la fecha seleccionada
            var selectedVehicle = this.value;
            var selectedDate = document.getElementById('date').value;
            console.log(date);
            // Realizar una solicitud AJAX al servidor para obtener los conductores disponibles
            fetch('{{ route("get_drivers") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ date: selectedDate, vehicle_id: selectedVehicle })
        })
        .then(function(response) {
            if (!response.ok) {
                console.log(response);
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(function(data) {
            console.log("updeted other",data);
            
            
        })
        });
    });
</script>

