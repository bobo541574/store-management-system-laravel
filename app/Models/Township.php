<?php

namespace App\Models;

use App\Models\City;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}