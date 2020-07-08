<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Users extends Authenticatable
{
  use HasApiTokens, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'uid';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    // protected $fillable = [
    //   'user_name','email','password'
    // ];
    
    protected $guarded = [];
    protected $hidden = [
      'password'
    ];
    public function scenic()
    {
      return $this->hasMany(Scenic::class);
    }
    public function introduction()
    {
      return $this->hasMany(Introduction::class);
    }

}
