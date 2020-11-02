<?php

namespace App\Models;

use App\Models\City;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function test()
    {
        return "Hello";
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}