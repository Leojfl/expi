<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tariff
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property float $time
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
    protected $fillable = ['title', 'price', 'time'];
    protected $appends = ['full_time'];

    public function getFullTimeAttribute($key)
    {
        $fullTime = "";
        $minutes = $this->time;
        if ($minutes > 60) {
            $hours=((int)($minutes / 60));
            if($hours==1){
                $fullTime = $hours . ' hora';
            }else{
                $fullTime = $hours . ' horas';
            }
            if( ($minutes % 60)>0){
                $fullTime= $fullTime.' '.($minutes % 60). ' minutos ';
            }

        } else {
            $fullTime = $minutes . " minutos";
        }
        return $fullTime;
    }


}
