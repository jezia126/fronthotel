<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'npr','adresse','email'
    ];
    public function reservation()
    { 
        return $this->hasMany(Reservation::class ,"clientID"); 
    }
    
}
