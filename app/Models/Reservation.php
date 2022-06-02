<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'numreservation','datearr','datedep','chambreID','clientID'
    ];

    public function chambres()
    { 
        return $this->belongsTo(Chambre::class,"chambreID"); 
    }
    public function clients()
    { 
        return $this->belongsTo(Client::class,"clientID"); 
    }

}
