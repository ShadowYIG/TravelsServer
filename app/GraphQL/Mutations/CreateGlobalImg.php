<?php

namespace App\GraphQL\Mutations;
use App\PublicImgList;
class CreateGlobalImg
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
      $file = $args['file'];
      $type = $args['type'];
      $extension = $file->getClientOriginalExtension();
      $fileName = $file->getClientOriginalName();
      $newFileName = $type . substr(md5($fileName),0,10) . '.' . $extension;
      $Path = $file->storePubliclyAs('public', $newFileName);
      $webPath = 'storage/' . $newFileName;
      $data = [
        'name'=>$newFileName,
        'extension'=>$extension,
        'img_src'=>$webPath,
        'type'=>$type
      ];
      $GobalImg = PublicImgList::create($data);
      return $GobalImg;
    }
}
