<?php

namespace Donkovah\Teaket\Traits;

use Donkovah\Teaket\Model\Teaket;

trait TeaketModel
{
    public function myTeakets()
    {
        return $this->hasMany(Teaket::class);
    }

    public function teakets()
    {
        return $this->belongToMany(Teaket::class)
        ->withPivot('is_admin')
        ->withTimestamps();

    }

    // get user's open ticket
    public function openTeakets()
    {
        return $this->teakets::where('status_id', '=', 'open');//revisit status_id
    }

    // get user's closed ticket
    public function closedTeakets()
    {
        return $this->teakets::where('status_id', '=', 'closed');//revisit status_id
    }

}