<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //scrivo i tre tipi da immettere nella tabella
        //Full_stack Type
        $full_stack=new Type();
        $full_stack->name="Full Stack";
        $full_stack->description="project worked on both frontend and backend ";
        $full_stack->icon="fa-solid fa-sitemap";
        $full_stack->save();
        //front_end Type
        $front_end=new Type();
        $front_end->name="Full Stack";
        $front_end->description="project worked on both frontend side";
        $front_end->icon="fa-firefox-browser";
        $front_end->save();
        //back_end Type
        $back_end=new Type();
        $back_end->name="Full Stack";
        $back_end->description="project worked on both  backend side";
        $back_end->icon="fa-solid fa-desktop";
        $back_end->save();
    }
}
