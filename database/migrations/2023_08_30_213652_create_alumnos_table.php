<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('lastname', 255);
            $table->string('email', 255)->unique();
            $table->enum('state', ['Paid', 'Pending'])->default('Pending');
            $table->boolean('peruvian');
            $table->boolean('assistance');
            $table->string('phone', 15);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->bigInteger('id_company')->unsigned();
            $table->foreign('id_company')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
