<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\ModelHasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    public $roleArray = [];

    // protected $primaryKey = 'uid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'name', 'email', 'profile', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'client');
    }

    public function modelHasRoles()
    {
        return $this->morphMany(ModelHasRoles::class, 'model');
    }

    public function getPhotoAttribute()
    {
        return asset('/img/user/' . $this->profile);
    }

    public function getuserRolesAttribute()
    {
        return $this->roles()->pluck('id')->toArray();
    }

    public function getRoleNameAttribute()
    {
        $roles = [];
        // array_map();
        // $this->roles()->pluck('name')->toArray();
        array_map($this->test($this->roles()->pluck('name')->toArray()), $this->roles()->pluck('name')->toArray());
        // foreach($this->roles()->pluck('name')->toArray() as $name) {

        // }
        return;
    }

    public function test($a)
    {
        return $a . ',' . $a;
    }
}