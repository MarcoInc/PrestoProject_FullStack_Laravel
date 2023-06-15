<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $house_image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($house_image_id){
        $this->house_image_id = $house_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void{
        $i = Image::find($this->house_image_id); //cattura l'immagine dal DB
    
        //Se non trova un record
        if (!$i) {
            return;
        }
        //Conterà l'immagine vera e propria nel path in storage
        $image = file_get_contents(storage_path('app/public/' . $i->path));

        //variabili d'ambiente per usare google vision
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        //Classe che estrare le informazioni richieste
        $imageAnnotator = new ImageAnnotatorClient();
        //Contiene la risposta da Google
        $response = $imageAnnotator->labelDetection($image);
        //Contiene le sole Label dalla risposta
        $labels = $response->getLabelAnnotations();

        //se ci sono label
        if ($labels) {
            $result = []; //array vuoto che conterrà le label
            foreach ($labels as $label) { //scorre tutte le label trovate
                $result[] = $label->getDescription(); //ne mette il nome nell'array result
            }

            $i->labels = $result;   //Salva nel DB nel campo labels
            $i->save();   //conferma le modifiche
            //label verrà ripreso nel modell Image in cast
        }
        //chiude collegamento con Google
        $imageAnnotator->close();
    }
}