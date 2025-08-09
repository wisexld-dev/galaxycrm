<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('recruitments', function(Blueprint $table){
            $table->id();
            $table->foreignId('recruiter_id')->constrained('members');
            $table->foreignId('recruited_member_id')->constrained('members');
            $table->date('data');
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('recruitments'); }
};
