<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SizeAttribute extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'letter', 'number'
    ];

    public function getLetterNumberAttribute()
    {
        return ($this->letter != null) ? $this->letter . '-' . $this->number : $this->number;
    }
}