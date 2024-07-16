<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Tecnology;
use Faker\Generator as Faker;


class TecnologyProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //inserire il dato di id tramite gli argomenti della funzione 
    public function run(Faker $faker, Tecnology $tecnology): void
    {
        //parto recuperando un progetto
        $project=Project::find(1);
        $project->tecnologies()->attach($tecnology->id);
        $project->save();
    }
}
