<?php

namespace App\Models;

use App\Models\City;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Township extends Model
{
    use SoftDeletes;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}