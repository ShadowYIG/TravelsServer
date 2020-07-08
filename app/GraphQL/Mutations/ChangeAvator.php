<?php

namespace App\GraphQL\Mutations;
use App\Users;
class ChangeAvator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        /** @var \Illuminate\Http\UploadedFile $file */
        $file = $args['file'];
        $extension = $file->getClientOriginalExtension();
        $fileName = $file->getClientOriginalName();
        $newFileName = substr(md5($fileName),0,10) . '.' . $extension;
        $Path = $file->storePubliclyAs('user', $newFileName);
        $User = Users::find($args['uid']);
        $User->avatar_src = $Path;
        $User->save();
        return $Path;
    }
}
