<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scenic extends Model
{
    protected $table = 'scenic';
    protected $primaryKey = 'sid';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $guarded = [];
    public function users():BelongsTo
    {
      return $this->belongsTo(Users::class);
    }
    public function img_list()
    {
      return $this->hasMany(Scenic_Img_List::class);
    }
}
