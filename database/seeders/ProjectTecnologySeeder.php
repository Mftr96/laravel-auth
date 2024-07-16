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
              //parto recuperando un progetto
              $project=Project::find(1);
              $tecnology=Tecnology::find(1);
              $project->tecnologies()->attach(1);
              $project->save();
    }
}
