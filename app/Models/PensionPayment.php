<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PensionPayment
 *
 * @property int $id
 * @property float $amount
 * @property string $date
 * @property int $fk_id_pension
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PensionPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PensionPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PensionPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PensionPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PensionPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PensionPayment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PensionPayment whereFkIdPension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PensionPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PensionPayment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $fk_id_special
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PensionPayment whereFkIdSpecial($value)
 */
class PensionPayment extends Model
{
    protected $table = 'pension_payment';
}
