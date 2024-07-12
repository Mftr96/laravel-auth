<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newProject=new Project();
        $newProject->name="e-commerce";
        $newProject->description="un bellissimo sito di e-commerce per compare cose belle";
        $newProject->creation_date="2024-05-03";
        $newProject->type_id = $faker->numberBetween(1, 3);
        $newProject->is_completed=false;
        $newProject->save();
        //-----------
        //creazione ciclo faker per finti progetti 
        for ($i=0; $i=3 ; $i++) { 
            $newProject=new Project();
            $newProject->name=$faker->sentence(3);
            $newProject->description=$faker->sentence(22);
            $newProject->creation_date=$faker->date();
            $newProject->is_completed=false;
            $newProject->save(); 
        }
    }
}

