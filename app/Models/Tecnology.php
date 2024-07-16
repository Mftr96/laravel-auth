<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//aggiungo il percorso per Project per poter scrivere la funzione many to many 
use App\Models\Project;

class Tecnology extends Model
{
    use HasFactory;


    protected $fillable=[
        "name",
        "icon",
    ];

    //scrivo la funzione per collegare Tecnology a Project
    public function projects(){
        return $this->belongsToMany(Project::class);
    }

}
