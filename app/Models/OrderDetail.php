<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should have incrementing primary keys.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'bus_schedule_id',
        'seat_id',
        'date_screening',
    ];

    /**
     * The data type of the primary key.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Get the order associated with the order detail.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Get the bus schedule associated with the order detail.
     */
    public function busSchedule()
    {
        return $this->belongsTo(BusSchedule::class, 'bus_schedule_id');
    }

    /**
     * Get the seat associated with the order detail.
     */
    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }
}
