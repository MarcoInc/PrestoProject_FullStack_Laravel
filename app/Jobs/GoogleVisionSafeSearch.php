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

class GoogleVisionSafeSearch implements ShouldQueue
{
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

        //Conterà l'immagine vera e propria nel path in storage
        $image= file_get_contents(storage_path('app/public/'. $i->path));

        //variabili d'ambiente per usare google vision
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        //Classe che estrare le informazioni richieste
        $imageAnnotator= new ImageAnnotatorClient();
        //Contiene la risposta da Google
        $response = $imageAnnotator->safeSearchDetection($image);
        //Chiudiamo il collegamento con Google
        $imageAnnotator->close();

        //Contiene le informazioni che ci servono
        $safe =$response->getSafeSearchAnnotation();

        //I vari valori della Safe Search
        $adult = $safe->getAdult();
        $medical =$safe->getMedical();
        $spoof =$safe->getSpoof();
        $violence =$safe->getViolence();
        $racy =$safe->getRacy();

        //Array icone a mò di semaforo
        $likelihoodName = [
            'text-secondary fas fa-circle','text-success fas fa-circle','text-secondary fas fa-circle','text-warning fas fa-circle', 'text-warning fas fa-circle','text-danger fas fa-circle'
        ];

        //Associo il valore del semaforo al grado dei singoli risultati
        $i->adult = $likelihoodName[$adult];
        $i->medical = $likelihoodName[$medical];
        $i->spoof = $likelihoodName[$spoof];
        $i->violence = $likelihoodName[$violence];
        $i->racy= $likelihoodName[$racy];

        //salvo nel database i valori che useremo per il semaforo
        $i->save();
    }
}