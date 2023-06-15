<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Manipulations;
use Spatie\Image\Image as SpatieImage;

class AddWatermark implements ShouldQueue{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $house_image_id;
    /**
     * Create a new job instance.
     */
    //Questo job conterrà l'immagine di riferimento richiamato nella store() nella classe di livewire
    public function __construct($house_image_id){
        $this->house_image_id=$house_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void{
        $i =Image::find($this->house_image_id); //cattura l'immagine dal DB
        if(!$i){ //Se non trova un record
            return;
        }

        //Path delle immagini
        $srcPath=storage_path('app/public/' .$i->path);

        //Conterà l'immagine vera e propria nel path in storage
        $image= file_get_contents($srcPath);

        
        $image=SpatieImage::load($srcPath);

        //TODO SISTEMARE
        //aggiunge un watermark
        $image->watermark(base_path('resources/img/logo.png'))
            ->watermarkPadding(10, 10, Manipulations::UNIT_PERCENT) // Padding dal bordo sinistro e inferiore
            ->watermarkPosition(Manipulations::POSITION_BOTTOM_LEFT) // Posiziona in basso a sinistra
            ->watermarkHeight(30, Manipulations::UNIT_PERCENT) // Percentuale di altezza
            ->watermarkWidth(30, Manipulations::UNIT_PERCENT); // Percentuale di larghezza
            
        $image->save($srcPath); //salva l'immagine editata con il watermark


    }
}