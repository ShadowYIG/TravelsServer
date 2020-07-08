<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TravelImg extends Model
{
  protected $primaryKey = 'img_id';
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  protected $guarded = [];
  public function travel():BelongsTo
    {
      return $this->belongsTo(Travels::class);
    }
}
