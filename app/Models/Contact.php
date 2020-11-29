<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Township;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'phone', 'address', 'township_id', 'city_id', 'state_id', 'email'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function township()
    {
        return $this->belongsTo(Township::class);
    }

    public function contactable()
    {
        return $this->morphTo();
    }

    public function getAddressingAttribute()
    {
        return $this->address . ', ' . $this->township->name . ', ' . $this->city->name . ', ' . $this->state->name . '.';
    }
}