<?php
namespace App\Admin\Traits;
use Illuminate\Support\Str;

trait Setup
{
    public function uniqidReal($lenght = 13) {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return Str::upper(substr(bin2hex($bytes), 0, $lenght));
    } 

    public function createCodeUser(){
        return 'U'.$this->uniqidReal(5).time();
    }

    public function folderUploadFileForUser($path = '/'){
        $path = $path == '/' ? '/' : '/'.Str::finish($path, '/');
        return 'users/'.auth()->user()->id.$path;
    }
}