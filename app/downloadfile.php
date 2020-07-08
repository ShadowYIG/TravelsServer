<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class downloadfile extends Model
{
  protected $table = 'downloadfile';
  protected $primaryKey = 'did';
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  protected $guarded = [];

}

