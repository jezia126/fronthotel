<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable = [
        'numchambre','type','prix','caracteristiques','imagechambre'
    ];

    public function reservation()
    { 
        return $this->hasMany(Reservation::class ,"chambreID"); 
    }


}
