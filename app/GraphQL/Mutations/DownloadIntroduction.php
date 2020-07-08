<?php

namespace App\GraphQL\Mutations;
use App\downloadfile;
use App\Introduction;
class DownloadIntroduction
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
      $intro = Introduction::find($args['iid']);
      $fileSrc = $intro['file_src'];
      $data = [
        'file_src'=>$fileSrc,
        'name'=>$intro['name'].'.'.substr(strrchr($fileSrc, '.'), 1),
        'token'=>sha1($intro['name'].strval(strtotime('now'))),
      ];
      //sha1($intro['name']+strval(strtotime('now')))
      $re = downloadfile::create($data);
      return 'download/'.$data['token'];
    }
}
