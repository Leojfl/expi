<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tariff
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property string $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $fk_id_parking
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tariff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tariff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tariff query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tariff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tariff whereFkIdParking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tariff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tariff wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tariff whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tariff whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tariff whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tariff extends Model
{
    protected $table = 'tariff';
}
