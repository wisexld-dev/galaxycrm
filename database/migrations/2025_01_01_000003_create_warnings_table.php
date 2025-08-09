<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('warnings', function(Blueprint $table){
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->text('motivo');
            $table->foreignId('autor_id')->nullable()->constrained('members');
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('warnings'); }
};
