<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $newProject=new Project();
        $newProject->name="e-commerce";
        $newProject->description="un bellissimo sito di e-commerce per compare cose belle";
        $newProject->creation_date="2024-05-03";
        $newProject->is_completed=false;
        $newProject->save();
        //-----------
        //creazione ciclo faker per finti progetti 
        for ($i=0; $i<3 ; $i++) { 
            $newProject=new Project();
            $newProject->name=$faker->sentence(1);
            $newProject->description=$faker->sentence(10);
            $newProject->creation_date=$faker->date();
            $newProject->is_completed=false;
            $newProject->save(); 
        }
    }
}

