<?php

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Storage;
class DeleteFile
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
      // Storage::delete($args['filesrc']);
      return Storage::delete($args['filesrc']);
    }
}
