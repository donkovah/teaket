<?php

namespace Donkovah\Teaket\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    /**
     * Creates Comment relationship with model.
    */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Assuming you used the Default User Model
     * as your base model.
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
