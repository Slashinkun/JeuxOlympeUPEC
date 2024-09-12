<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sport; 
use App\Models\Lieu;
use App\Models\Spectateur;

class Competition extends Model
{
    use HasFactory;

    

    public function sport(){
        return $this->belongsTo(Sport::class);
    }

    public function lieu(){
        return $this->belongsTo(Lieu::class);
    }

    public function spectateur(){
        return $this->belongsToMany(Spectateur::class);
    }
}
