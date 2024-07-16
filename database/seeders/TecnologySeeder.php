<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//ricordati di importare la classe Tecnology, non lo fa in automatico
use App\Models\Tecnology;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        //creo le tecnologie Vue,Laravel,Html,css
        $techVue=new Tecnology();
        $techVue->name="VueJs";
        $techVue->icon="fa-brands fa-vue";
        $techVue->save();

        $techLaravel=new Tecnology();
        $techLaravel->name="Laravel";
        $techLaravel->icon="fa-brands fa-laravel";
        $techLaravel->save();

        $techHTML=new Tecnology();
        $techHTML->name="HTML";
        $techHTML->icon="fa-brands fa-html";
        $techHTML->save();

        $techCss=new Tecnology();
        $techCss->name="css";
        $techCss->icon="fa-brands fa-css";
        $techCss->save();

    }
}
