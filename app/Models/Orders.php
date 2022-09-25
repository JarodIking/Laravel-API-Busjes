<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Columns
     *
     *
     */
    protected $fillable = [
        'uuid',
        'vehicle_id',
        'chosen_volume',
        'days',
        'kilometers',
        'total_price',
    ];
}
