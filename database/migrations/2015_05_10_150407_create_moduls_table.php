<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moduls', function (Blueprint $table) {
            $table->id();
            $table->string('nom',25);
            $table->integer('hores');
            $table->foreignId('curs_id')
                    ->nullable()
                    ->constrained('cursos')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId('users_id')
                    ->nullable()
                    ->constrained('users')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moduls');
    }
};