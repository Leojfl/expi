<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ParkingPayment
 *
 * @property int $id
 * @property float $amount
 * @property string $date
 * @property int $fk_id_parking
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingPayment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingPayment whereFkIdParking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParkingPayment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ParkingPayment extends Model
{
    protected $table='parking_payment';

}
