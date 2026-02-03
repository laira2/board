<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'board';

    use HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['title','content','author'];
}
