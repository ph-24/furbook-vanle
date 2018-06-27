<?php

namespace Furbook;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
    protected $cats = [
        'is_admin' => 'boolen'];
    public function cats(){
        return $this->hasMany('Furbook\Cat');
    }
    public function owns('Cat $cat'){
        return $this->id == $cat->user_id;
    }
    public function canEdit(Cat $cat){
        return $this->is_admin||$this->owns($cat);
    }
    public function isAdministrator(){
        return $this->getAtribute('is_admin');
    }
}
