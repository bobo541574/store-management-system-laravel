<?php

namespace App\Models;

use App\Models\State;
use App\Models\Contact;
use App\Models\Township;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function townships()
    {
        return $this->hasMany(Township::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}