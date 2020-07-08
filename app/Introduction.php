<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Introduction extends Model
{
  protected $table = 'introduction';
  protected $primaryKey = 'iid';
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  protected $guarded = [];
  public function users():BelongsTo
  {
    return $this->belongsTo(Users::class);
  }
}
