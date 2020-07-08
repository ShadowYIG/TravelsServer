<?php

namespace App\GraphQL\Mutations;
use App\TravelImg;
class UploadTravelFile
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
        $Path = $file->storePubliclyAs('travel', $newFileName);
        $webPath = 'travel/' . $newFileName;
        $data = [
          'img_src'=>$webPath,
          'travels_tid'=>$args['tid']
        ];
        TravelImg::create($data);
        $imgList[] = $webPath;
      }
      return $imgList;
    }
}
