<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

//*contiene tutti i comandi
class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */


    //firma del comando con nome ed eventuali argomenti <- email , value (0 o 1)
        //*lanciabile da terminale o da Artisan:: <- va aggiunto nel file app/console/kernel.php
    protected $signature = 'presto:makeUserRevisor {email} {value}';

    /**
     * The console command description.
     *
     * @var string
     */

     //descrizione comando
    protected $description = 'Rende un utente revisore o leva i permessi ';

    /**
     * Execute the console command.
     */

    //azione del comando
    public function handle(){
        //salvo in user il primo utente con quella determianta email che abbiamo passato come argomento
        $user=User::where('email',$this->argument('email'))->first();

        if(!$user){ //*se non c'è l'utente
            $this->error("Nessun utente trovato");
            return;
        }
        //se viene trovato un utente con quella determianta email
        if($this->argument('value')==1){
            if( $user->is_revisor==1)
                echo 'L\'user '. $user->name .' ('.$user->email.') è già un revisore'; 
            else{
                $user->is_revisor=true; //attributo DB is_revisor a true
                $user->save();      //salva le informazioni
                echo 'L\'user '. $user->name .' ('.$user->email.') adesso è un revisore'; 

                //?$user->info(`Utente {$user->name} adesso è un revisore`); //mostra un messaggio
            }
        }
        else if($this->argument('value')==0){
            if( $user->is_revisor==0)
                echo 'L\'user '. $user->name .' ('.$user->email.') è già un utente normale'; 
            else{
                $user->is_revisor=false; 
                $user->save();      
                echo 'L\'user '. $user->name .' ('.$user->email.') non è più un revisore'; 

                //?$user->info(`L'user {$user->name} non è più un revisore`); 
            }
        }
    }
}

