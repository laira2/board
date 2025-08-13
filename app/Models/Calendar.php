<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendar extends Model
{
    //
    use SoftDeletes;

    protected $table = 'calendars';

    protected $fillable = ['title','regist_user_id','board_id', 'start_date', 'end_date','type' ];

}
