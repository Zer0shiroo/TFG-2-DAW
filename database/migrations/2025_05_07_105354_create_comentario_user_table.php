<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('comentario_user', function (Blueprint $table) {
            $table->id();

            $table->foreignId('comentario_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('usuario_id') 
                ->constrained('usuarios') 
                ->onDelete('cascade');

            $table->timestamps();

            $table->unique(['comentario_id', 'usuario_id']); 
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('comentario_user');
    }
};
