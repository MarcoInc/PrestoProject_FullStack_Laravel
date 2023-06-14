<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    public function guest_house()
    {
        return $this->belongsTo(GuestHouse::class);
    }


    public static function getUrlByFilePath($filePath , $w = NULL , $h = NULL){
        if(!$w && !$h){
            return Storage::url($filePath);
        }

        $path = dirname($filePath);
        $filename = basename($filePath);
        $file = "{$path}/crop_{$w}x{$h}_{$filename}";

        return Storage::url($file);
    }

    public function getUrl($w = NULL , $h = NULL){
        return Image::getUrlByFilePath($this->path, $w , $h);
    }

}
