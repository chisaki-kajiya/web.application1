<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = array('id');
    protected $fillable = ['name', 'tag_id', 'user_id'];

    public function tag(){
        return $this->belongsTo('App\Models\Tag');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
