<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */


    private $w;
    private $h;
    private $fileName;
    private $path;

    public function __construct($filePath , $w , $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        $croppedImage = Image::load($srcPath)
                        ->crop(Manipulations::CROP_CENTER , $w , $h)
                        // ->save($destPath);



                        ->watermark(base_path('resources/img/logo2.png'))
                        ->watermarkOpacity(75)
                        ->watermarkPosition('bottom-right')
                        ->watermarkPadding(10, 10, Manipulations::UNIT_PIXELS)
                        ->watermarkWidth(94, Manipulations::UNIT_PIXELS)
                        ->watermarkHeight(35, Manipulations::UNIT_PIXELS)
                        // ->watermarkFit(Manipulations::FIT_STRETCH)
                        ->save($destPath);
                               
    }
}