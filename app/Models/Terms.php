<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Terms
 *
 * @property int $id
 * @property string $terms
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Terms newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Terms newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Terms query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Terms whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Terms whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Terms whereTerms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Terms whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Terms extends Model
{
    protected $table = 'terms';

}
