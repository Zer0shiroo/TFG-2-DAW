<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::table('cuadros', function (Blueprint $table) {
            $table->year('anio_creacion');
            $table->string('tecnica')->nullable();
            $table->string('dimensiones')->nullable();
            $table->string('estilo')->nullable();
        });
    }
    

  
    public function down(): void
    {
        Schema::table('cuadros', function (Blueprint $table) {
            
        });
    }
};
