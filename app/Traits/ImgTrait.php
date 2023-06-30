<?php

namespace  App\Traits;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

Trait ImgTrait {
    public function storeImg($dir , $file , $old = null){
        if ($file){
            if ($old){
                $this->deleteImg($old);
            }
            $path = $file->store($dir  , [
                'disk' => 'public'
            ]);
            return $path;
        }else{
        return  new Exception('opps! this not vaild file' , 400);
        }
    }

    public  function deleteImg($file){
        if (Storage::disk('public')->exists($file)){
            Storage::disk('public')->delete($file);
        }
    }
}
