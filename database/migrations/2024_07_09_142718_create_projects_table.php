<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //creazione colonne tabella 
            $table->string("name");
            $table->string("description");
            $table->date("creation_date");
            // $table->foreignId('type_id')->constrained(table:'types',indexName: 'posts_user_id');
            $table->boolean("is_completed");
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
