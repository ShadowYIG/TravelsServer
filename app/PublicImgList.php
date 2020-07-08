<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicImgList extends Model
{
  protected $primaryKey = 'img_id';
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  protected $guarded = [];
}
