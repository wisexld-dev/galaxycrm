<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('farms', function(Blueprint $table){
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->string('item');
            $table->integer('quantidade');
            $table->foreignId('gerente_id')->nullable()->constrained('members');
            $table->date('data_recebimento');
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('farms'); }
};
