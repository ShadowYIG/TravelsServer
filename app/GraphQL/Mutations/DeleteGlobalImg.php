<?php

namespace App\GraphQL\Mutations;
use App\PublicImgList;
use Illuminate\Support\Facades\Storage;
class DeleteGlobalImg
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
      $PublicImg=PublicImgList::find($args['imgId']);
      // var_dump($PublicImg);
      $PublicImg->delete();
      $flag = true;
      if(PublicImgList::where('name',$PublicImg['name'])->count()==0){
        $flag = Storage::delete('public/'.$PublicImg['name']);
      }
      return $flag;
    }
}
