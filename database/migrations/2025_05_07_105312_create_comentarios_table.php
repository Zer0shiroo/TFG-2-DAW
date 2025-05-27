<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::create('comentarios', function (Blueprint $table) {
        $table->id();
        $table->text('contenido');
        $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
        $table->foreignId('cuadro_id')->nullable()->constrained()->onDelete('cascade');
        $table->foreignId('libro_id')->nullable()->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}


   
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
