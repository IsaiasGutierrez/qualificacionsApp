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
        Schema::create('curs_usuari', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curs_id')
                    ->nullable()
                    ->constrained('cursos')
                    ->cascadeOnUpdate()
                    ->nullOnDelete()
                    ->unique();
            
            $table->foreignId('user_email')
                    ->nullable()
                    ->constrained('users')
                    ->cascadeOnUpdate()
                    ->nullOnDelete()
                    ->unique();

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
        Schema::dropIfExists('curs_usuari');
    }
};
