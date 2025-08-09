<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('members', function(Blueprint $table){
            $table->id();
            $table->string('nome');
            $table->string('discord')->nullable();
            $table->string('member_login')->nullable();
            $table->string('member_password')->nullable();
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('members'); }
};
