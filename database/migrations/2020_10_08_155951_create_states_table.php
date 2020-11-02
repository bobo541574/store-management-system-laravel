<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
        });

        // DB::table('states')->insert([
        //     ['id' => '1', 'name' => 'Ayeyarwady'],
        //     ['id' => '2', 'name' => 'Bago'],
        //     ['id' => '3', 'name' => 'Chin'],
        //     ['id' => '4', 'name' => 'Kachin'],
        //     ['id' => '5', 'name' => 'Kayah'],
        //     ['id' => '6', 'name' => 'Kayin'],
        //     ['id' => '7', 'name' => 'Magway'],
        //     ['id' => '8', 'name' => 'Mandalay'],
        //     ['id' => '9', 'name' => 'Mon'],
        //     ['id' => '10', 'name' => 'Naypitaw U.Territory'],
        //     ['id' => '11', 'name' => 'Rakhine'],
        //     ['id' => '12', 'name' => 'Sagaing'],
        //     ['id' => '13', 'name' => 'Shan-East'],
        //     ['id' => '14', 'name' => 'Shan-North'],
        //     ['id' => '15', 'name' => 'Shan-South'],
        //     ['id' => '16', 'name' => 'Tanintharyi'],
        //     ['id' => '17', 'name' => 'Yangon'],
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}