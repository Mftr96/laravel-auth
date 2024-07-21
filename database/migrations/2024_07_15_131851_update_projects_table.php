<?php
/*creato da terminale con php artisan make:migration update_projects_table
(probabilmente c'è da seguire il nome giusto anche per le altre tabelle)
*/
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
        //comando che richiama tabella Projects(?)
        Schema::table('projects', function (Blueprint $table) {
            $table->string('cover_image')->nullable();
            /*aggiungo il type_id per la relazione one to many
            ricordati che deve essere creata prima la tabella Type e poi 
            la tabella Project per non creare errori, oppure crei la tabella Project,
            poi la type e aggiorni con una nuova migration la tabella Project
            */
            $table->foreignId('type_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            
            $table->dropForeign('projects_type_id_foreign');
            $table->dropColumn('type_id');

        });
    }
};
