<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalibrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calibrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->date('date_calibrage');
            $table->date('date_prochaine_calibrage');
            $table->timestamps();
            // Foreign key constraint
            $table->foreign('material_id')->references('id')->on('materiels')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calibrations');
    }
}
