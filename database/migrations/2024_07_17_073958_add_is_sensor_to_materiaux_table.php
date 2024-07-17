<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsSensorToMateriauxTable extends Migration
{
    public function up()
    {
        Schema::table('materiels', function (Blueprint $table) {
            $table->boolean('is_sensor');
        });
    }

    public function down()
    {
        Schema::table('materiels', function (Blueprint $table) {
            $table->dropColumn('is_sensor');
        });
    }
}
