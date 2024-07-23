<?php
//modello relativo al form dei contatti 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    //aggiungo il protected con array contenente gli attributi name del form AppContact lato vue
    protected $fillable=['name','email','description'];
}
