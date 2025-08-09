<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('partnerships', function(Blueprint $table){
            $table->id();
            $table->string('titulo');
            $table->string('imagem')->nullable();
            $table->string('area_risco')->nullable();
            $table->string('contato_responsavel')->nullable();
            $table->string('produto')->nullable();
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('partnerships'); }
};
