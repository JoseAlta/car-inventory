<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="col-2"><div class="form-group mb-2 mb20">
            <label for="date" class="form-label">{{ __('Date') }}</label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $trip?->date) }}" id="date" placeholder="Date">
            {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div></div>
    </div>
    <div class="col-md-12">
        <div class="col-3">
            <div id="vehicle" class="form-group mb-2 mb20" hidden>
                <label for="vehicle_id" class="form-label">{{ __('Vehicle') }}</label>
                <select name="vehicle_id" class="form-control" id="vehicle_id">
                </select>
                {!! $errors->first('vehicle_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        
    </div>
    <div class="col-md-12">
<div class="col-2">
    <div class="form-group mb-2 mb20" id="driver" hidden>
        <label for="driver_id" class="form-label">{{ __('Driver') }}</label>
        <select name="driver_id" class="form-control" id="driver_id">
        </select>
        {!! $errors->first('driver_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>
</div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function getVehicles(selectedDate){
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
                    throw new Error('Network response was not ok');
                }
                return response.json();
            }).then(function(data) {
                listVehicles(data);
                
            })

        }
        function getDrivers(selectedVehicle){
            var selectedDate = document.getElementById('date').value;
            console.log(date);
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
                listDrivers(data);
            })
        }
        function listVehicles(data){
            var vehicleSelect = document.getElementById('vehicle_id');
                vehicleSelect.innerHTML = '';
                var option = document.createElement('option');
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
        }
        function listDrivers(data){
            var driverSelect = document.getElementById('driver_id');
                driverSelect.innerHTML = '';
                var option = document.createElement('option');
                option.textContent = "Select a driver";
                driverSelect.appendChild(option);
                data.forEach(vehicle => {
                    var option = document.createElement('option');
                    option.value = vehicle.id;
                    option.textContent = vehicle.name ;
                    driverSelect.appendChild(option);
                });
            var driverdom = document.getElementById('driver');
    
            driverdom.removeAttribute('hidden');
        }
        
        document.getElementById('date').addEventListener('change', function() {
            var selectedDate = this.value;
            getVehicles(selectedDate);   
        });

        document.getElementById('vehicle_id').addEventListener('change', function() {
            var selectedVehicle = this.value;
            getDrivers(selectedVehicle);
         
        });
    });
</script>

