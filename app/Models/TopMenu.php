<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TopMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TopMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TopMenu query()
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TopMenu whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TopMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TopMenu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TopMenu whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TopMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TopMenu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TopMenu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TopMenu extends Model
{
    //
    protected $table = 'topmenu';

    protected $fillable = ['code', 'name', 'description'];

}
