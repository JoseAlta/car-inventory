<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Trip
 *
 * @property $id
 * @property $vehicle_id
 * @property $driver_id
 * @property $date
 * @property $created_at
 * @property $updated_at
 *
 * @property Driver $driver
 * @property Vehicle $vehicle
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Trip extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['vehicle_id', 'driver_id', 'date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo(\App\Models\Driver::class, 'driver_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(\App\Models\Vehicle::class, 'vehicle_id', 'id');
    }
    

}
