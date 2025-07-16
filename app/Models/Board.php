<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property string $id
 * @property string $title
 * @property string $author
 * @property string $content
 * @property bool $isDeleted
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board whereIsDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board whereUpdatedAt($value)
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Board whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Board extends Model
{
    protected $table = 'board';

    protected $fillable = ['title','content','author'];
}
