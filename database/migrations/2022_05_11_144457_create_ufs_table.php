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
        Schema::create('ufs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('modul_id')
                    ->nullable()
                    ->constrained('moduls')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            
            $table->integer('hores');
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
        Schema::dropIfExists('ufs');
    }
};
