<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('goals', function(Blueprint $table){
            $table->id();
            $table->string('slug')->unique();
            $table->string('titulo');
            $table->json('config')->nullable();
            $table->timestamps();
        });

        Schema::create('role_goal_configs', function(Blueprint $table){
            $table->id();
            $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('goal_id')->constrained('goals');
            $table->integer('quantidade')->nullable();
            $table->integer('period_days')->nullable();
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('role_goal_configs'); Schema::dropIfExists('goals'); }
};
