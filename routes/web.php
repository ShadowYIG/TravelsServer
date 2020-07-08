<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\downloadfile;
use App\PublicImgList;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/hello', function () {
//   // return Storage::download(Storage::path('public/97f850dd86.jpg'));
//   // return Storage::download(public_path('storage').'\97f850dd86.jpg');
//   // return Storage::download('F:\WEBhw\TravelsWeb\TravelsServer\public\storage\97f850dd86.jpg');
//   // return Storage::download('user/2760735506.jpg');
  
//   $PublicImg=PublicImgList::find(18);
//   // var_dump($PublicImg);
//   $PublicImg->delete();
//   echo 'public/'.$PublicImg['name'];
//   $flag = true;
//   if(PublicImgList::where('name',$PublicImg['name'])->count()==1){
//     $flag = Storage::delete('public/'.$PublicImg['name']);
//   }
//   return $flag;

//         // return UploadedFile::fake()->image('avatar.jpg')->storePublicly( ['disk' => 'public']);
//         // return UploadedFile::fake()->storePubliclyAs('images', "123.jpeg", ['disk' => 'public']);
// });

Route::get('/download/{token}', function ($token) {
  $dl = downloadfile::where('token',$token)->first();
  if($dl){
    $dl->delete();
    // Storage::download($dl['file_src'], $dl['name']);
    // echo '<script>window.close();</script>';
  //   $headers = [
  //     'Content-Type'  => 'application/zip',
  //     'Accept-Length' => filesize($dl['file_src']),
  // ];
    return Storage::download($dl['file_src'], $dl['name']);
    
  }else{
    return abort(404);
  }
  // return $intro;
});
