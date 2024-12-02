<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'class',
        'capacity',
        'price',
        'description',
    ];

    /**
     * Define the possible values for the 'class' attribute.
     *
     * @var array
     */
    public static $classes = ['Economy', 'Business', 'Executive'];

    /**
     * Check if the class is valid.
     *
     * @param string $value
     * @return bool
     */
    public static function isValidClass(string $value): bool
    {
        return in_array($value, self::$classes);
    }
}
