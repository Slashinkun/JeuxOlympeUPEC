<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Competition;

class Spectateur extends Model
{
    use HasFactory;

    public function competition(){
        return $this->belongsToMany(Competition::class);
    }
}
