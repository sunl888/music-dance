<?php

namespace App\Models;


class Message extends BaseModel
{
    protected $dates = ['reply_at', 'created_at', 'updated_at'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
