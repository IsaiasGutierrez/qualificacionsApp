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
        Schema::create('alumne_uf', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumne_id')
                    ->nullable()
                    ->constrained('alumnes')
                    ->cascadeOnUpdate()
                    ->nullOnDelete()
                    ->unique();
            
            $table->foreignId('uf_id')
                    ->nullable()
                    ->constrained('ufs')
                    ->cascadeOnUpdate()
                    ->nullOnDelete()
                    ->unique();
            $table->integer('notes');
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
        Schema::dropIfExists('alumne_uf');
    }
};
