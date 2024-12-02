<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSchedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bus_id',
        'bus_departure_id',
        'date',
        'time',
    ];

    /**
     * Get the bus associated with the schedule.
     */
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }

    /**
     * Get the bus departure associated with the schedule.
     */
    public function busDeparture()
    {
        return $this->belongsTo(BusDeparture::class, 'bus_departure_id');
    }
}
