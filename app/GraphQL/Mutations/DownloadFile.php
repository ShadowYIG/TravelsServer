<?php

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Storage;
class DownloadFile
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        if(isset($args['filename'])){
          // return Storage::download($args['filesrc'], $args['filename']);
          
        }else{
          // return Storage::download($args['filesrc']);
          
        }
        
    }
}
