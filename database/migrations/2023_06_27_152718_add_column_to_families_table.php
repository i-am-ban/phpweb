<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('families', function (Blueprint $table) {
            //
            $table->renameColumn('name', 'family_code');
            $table->integer('city_id')->default(0)->index()->nullable()->after('note');
            $table->integer('district_id')->default(0)->index()->after('city_id')->nullable();
            $table->integer('street_id')->default(0)->index()->after('district_id')->nullable();
            $table->string('address', 255)->nullable()->after('street_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('families', function (Blueprint $table) {
            //
        });
    }
}
