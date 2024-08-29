<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropClassModelsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Verifique se a tabela existe antes de tentar excluí-la
        if (Schema::hasTable('class_models')) {
            Schema::drop('class_models');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recrie a tabela class_models se necessário
        Schema::create('class_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
}
