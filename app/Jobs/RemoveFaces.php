<?php

namespace App\Jobs;

use App\Models\Image;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Spatie\Image\Manipulations;

class RemoveFaces implements ShouldQueue{
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
        $srcPath=storage_path('app/public/' . $i->path);
        
        //Conterà l'immagine vera e propria nel path in storage
        $image= file_get_contents($srcPath);
        
        //variabili d'ambiente per usare google vision
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
        
        //Classe che estrare le informazioni richieste
        $imageAnnotator= new ImageAnnotatorClient();
        //Contiene la risposta da Google
        $response = $imageAnnotator->faceDetection($image);
        
        //Contiene tutte le facce trovate
        $faces=$response->getFaceAnnotations();
        
        foreach($faces as $face){ //scorro le facce trovate
            $vertices=$face->getBoundingPoly()->getVertices();  //contiene i vertici di una faccia
            $bounds=[];   //conterrà gli angoli della faccia
            foreach($vertices as $vertix){ //scorro i vertici
                $bounds[]=[$vertix->getX(),$vertix->getY()]; //coordinate angolo
            }
            //largezza del viso
            $w=$bounds[2][0]-$bounds[0][0];  //angolo alto sx - alto dx
            //altezza del viso
            $h=$bounds[2][1]-$bounds[0][1];  //angolo basso sx - basso dx
            
            //Carica l'immagine con Spatie che ci permette di effettuare modifiche all'immagine
            $image=SpatieImage::load($srcPath);
            
            $image->watermark(base_path('resources/img/smile.png'))
            ->watermarkPosition('top-left')
            ->watermarkPadding($bounds[0][0],$bounds[0][1])
            ->watermarkWidth($w,Manipulations::UNIT_PIXELS)
            ->watermarkHeight($h,Manipulations::UNIT_PIXELS)
            ->watermarkFit(Manipulations::FIT_STRETCH);

       

        $image->save($srcPath); //salva l'immagine editata con il watermark
        }
        
        $imageAnnotator->close(); //chiude il collegamento con Google
        
    }
}