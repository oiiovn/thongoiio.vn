<?php

namespace App\Admin\Traits;

use Illuminate\Support\Str;

trait Upload
{
    function upload($request, $destinationPath, $file_name)
    {
        $file = $request->file('license');
        if($file){
            $name = Str::uuid()->toString() . '.' . $file->extension();
            $storedPath = $file->move($destinationPath, $name);
            return $storedPath;
        }else{
            return null;
        }
       
    }
}
