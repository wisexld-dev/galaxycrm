<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('cash_movements', function(Blueprint $table){
            $table->id();
            $table->enum('tipo', ['entrada','saida']);
            $table->decimal('valor', 12, 2);
            $table->text('descricao')->nullable();
            $table->foreignId('member_id')->nullable()->constrained('members');
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('cash_movements'); }
};
