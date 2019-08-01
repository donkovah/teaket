<?php

namespace Donkovah\Teaket\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Cviebrock\EloquentSluggable\Sluggable;

class Teaket extends Model
{
    use Sluggable;
    /**
     * generate Ticket slug automatically
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /**
     * Assuming you used the Default User Model
     * as your base model.
     * this relationship represent the creator of the teaket
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * This is for the admins or teaket attendants.
    */
    public function users()
    {
        return $this->belongsToMany(User::class)
        ->withPivot('is_admin')
        ->withTimestamps();
    }

    /**
     * This is for the admins or teaket attendants.
    */
    public function admin()
    {
        $admin = $this->belongsToMany(User::class)->wherePivot('is_admin', '=', true)->first();
        return $admin['first_name'].' '.$admin['last_name'];
    }

    /**
     * Create Comment Relationship.
    */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
