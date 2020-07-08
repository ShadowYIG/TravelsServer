<?php

namespace App\GraphQL\Mutations;

class SaveFile
{
     /**
     * Upload a file, store it on the server and return the path.
     *
     * @param  mixed  $root
     * @param  mixed[]  $args
     * @return string|null
     */
    public function __invoke($root, array $args)
    {
        /** @var \Illuminate\Http\UploadedFile $file */
        $files = $args['files'];
        $type = $args['type'];
        $webPaths = [];
        foreach($files as $file){
          $extension = $file->getClientOriginalExtension();
          // 文件名
          $fileName = $file->getClientOriginalName();
          // 生成新的统一格式的文件名
          $newFileName = substr(md5($fileName),0,10) . '.' . $extension;
          $webPath = asset($file->storePubliclyAs($type.'/', $newFileName));
          $webPath = $type.'/'.$newFileName;
          if($type=="public"){
            $webPath = '/storage/' . $newFileName;
          }
          $webPaths[]=$webPath;
        }
        
        return $webPaths;
    }
}
