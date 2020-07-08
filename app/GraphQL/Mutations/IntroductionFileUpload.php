<?php

namespace App\GraphQL\Mutations;
use App\Introduction;

class IntroductionFileUpload
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
      $file = $args['file'];
      $extension = $file->getClientOriginalExtension();
      $fileName = $file->getClientOriginalName();
      $newFileName = substr(md5($fileName),0,10) . '.' . $extension;
      $Path = $file->storePubliclyAs('introduction', $newFileName);
      $Introduction = Introduction::find($args['iid']);
      $Introduction->file_src = $Path;
      $Introduction->file_name = $newFileName;
      $Introduction->save();
      return $Path;
    }
}
