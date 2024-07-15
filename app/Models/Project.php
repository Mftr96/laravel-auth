<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "img",
        "type_id",
        "is_completed"
    ];

    //Tutti i Project avranno un metodo che restituisce la categoria a cui appartengono
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
