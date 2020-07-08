<?php

namespace App\GraphQL\Mutations;
use App\Scenic_Img_List;
class UploadScenicFile
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
      $files = $args['files'];
      $imgList = [];
      foreach($files as $file){
        $extension = $file->getClientOriginalExtension();
        $fileName = $file->getClientOriginalName();
        $newFileName = substr(md5($fileName),0,10) . '.' . $extension;
        $Path = $file->storePubliclyAs('scenic', $newFileName);
        $webPath = 'scenic/' . $newFileName;
        $data = [
          'img_src'=>$webPath,
          'scenic_sid'=>$args['sid']
        ];
        Scenic_Img_List::create($data);
        $imgList[] = $webPath;
      }
      return $imgList;
    }
}
