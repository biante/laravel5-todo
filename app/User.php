<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Check user status: 0 = Disabled; 1 = Visitor; 2 = Admin;

    public function isDisabled ()
    {
        return $this->statusCheck();
    }

    public function isVisitor ()
    {
        return $this->statusCheck(1);
    }

    public function isAdmin ()
    {
        return $this->statusCheck(2);
    }

    protected function statusCheck ($status = 0)
    {
        return $this->status === $status ? true : false;
    }
}
