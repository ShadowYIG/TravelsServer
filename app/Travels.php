<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Travels extends Model
{
  protected $table = 'travels';
  protected $primaryKey = 'tid';
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  protected $guarded = [];
  public function users():BelongsTo
  {
    return $this->belongsTo(Users::class);
  }
  public function img_list()
  {
    return $this->hasMany(TravelImg::class);
  }
}
