<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Tecnology;
use Faker\Generator as Faker;


class ProjectTecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker, Tecnology $tecnology): void
    {
              //parto recuperando un progetto tramite find
              $project=Project::find(1);
              //recupero le Tecnologie tramite find
              $tecnology=Tecnology::find(1);
              //"appiccico" la Tecnologia al Progetto
              $project->tecnologies()->attach(1);
              //salvo il progetto con la Tecnologia
              $project->save();
    }
}
