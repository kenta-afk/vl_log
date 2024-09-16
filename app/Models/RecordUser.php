<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordUser extends Model
{
    use HasFactory;

    protected $table = 'record_user'; //中間テーブルの指定

    protected $fillable = ['record_id', 'user_id', 'comment'];
}
