<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $table = 'history';

    protected $fillable = ['table_name', 'record_id', 'action', 'old_data','new_data','meta'];

    protected $casts = [
        'old_data' => 'array',
        'new_data' => 'array',
    ];
}
