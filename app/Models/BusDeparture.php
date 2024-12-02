<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusDeparture extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'checkpoint_start',
        'checkpoint_end',
        'multiplier',
        'description',
    ];

    /**
     * Get the starting checkpoint.
     */
    public function checkpointStart()
    {
        return $this->belongsTo(Checkpoint::class, 'checkpoint_start');
    }

    /**
     * Get the ending checkpoint.
     */
    public function checkpointEnd()
    {
        return $this->belongsTo(Checkpoint::class, 'checkpoint_end');
    }
}
