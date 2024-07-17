<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//importo la classe Tecnology per la funzione many to many 
use App\Models\Tecnology;
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "type_id",
        "is_completed",
        //aggiunto cover_image nei valori del $fillable
        "cover_image",
    ];

    //Tutti i Project avranno un metodo che restituisce la categoria a cui appartengono
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function tecnologies(){
        return $this->belongsToMany(Tecnology::class);
    }
}
