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
        Schema::create('alumne_moduls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumne_id')
                    ->nullable()
                    ->constrained('alumnes')
                    ->cascadeOnUpdate()
                    ->nullOnDelete()
                    ->unique();
            
            $table->foreignId('modul_id')
                    ->nullable()
                    ->constrained('moduls')
                    ->cascadeOnUpdate()
                    ->nullOnDelete()
                    ->unique();
            $table->integer('notamitjana');
            $table->text('comentaris')->nullable();
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
