<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Person extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function office_masters()
    {
    //子テーブルはbelongsTo or belongsToMany
    return $this->belongsTo('App\Models\OfficeMaster','user_id','user_id')->withDefault();
    }

}


