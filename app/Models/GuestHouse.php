<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuestHouse extends Model
{
    use HasFactory;
    protected $fillable=['place','beds','price','description','location_id','img','is_accepted'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    //static perchè conta tutte quelle esistenti, non è dell'oggetto singolo ma della classe
    public static function toBeRevisonedCounter(){
        return GuestHouse::where('is_accepted',null)->count();
    }

    //setta il proprio valore di is_accepted
    public function setAccepted(bool $value){
        $this->is_accepted=$value; //in base al valore passato
        $this->save();
        return true;
    }
    
    
}
