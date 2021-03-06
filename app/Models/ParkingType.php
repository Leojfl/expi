<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ParkingType
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingType whereName($value)
 * @mixin \Eloquent
 */
class ParkingType extends Model
{
    const PARKING =1;
    const PENSION = 2;
    const PARKING_AND_PENSION = 3;

    protected $table = 'parking_type';



}
