<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SizeAttribute extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'letter', 'number'
    ];

    public function getLetterNumberAttribute()
    {
        return ($this->letter != null) ? $this->letter . '-' . $this->number : $this->number;
    }
}