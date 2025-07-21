<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Url newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Url newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Url query()
 * @property int $id
 * @property string $url
 * @property string $topmenu_code
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Url whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Url whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Url whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Url whereTopmenuCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Url whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Url whereUrl($value)
 * @mixin \Eloquent
 */
class Url extends Model
{
    //
    protected $table = 'url';

    protected $fillable = ['topmenu_code', 'url'];

}
