<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('warehouse_movements', function(Blueprint $table){
            $table->id();
            $table->enum('tipo', ['entrada','saida']);
            $table->foreignId('item_id')->constrained('items');
            $table->integer('quantidade');
            $table->text('descricao')->nullable();
            $table->foreignId('member_id')->nullable()->constrained('members');
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('warehouse_movements'); }
};
