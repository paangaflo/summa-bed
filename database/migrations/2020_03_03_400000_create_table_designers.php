<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDesigners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designers', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->enum('type', ['GRAFICO', 'WEB'])->nullable(false);
            $table->unsignedBigInteger('employees_id')->nullable(false);
            $table->timestamps();
            $table->foreign('employees_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designers');
    }
}
