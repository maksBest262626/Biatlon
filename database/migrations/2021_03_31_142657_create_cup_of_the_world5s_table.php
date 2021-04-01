<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCupOfTheWorld5sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cup_of_the_world5', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('name');
            $table->string('country');
            $table->string('result');
            $table->string('type');
            $table->timestamps();
        });
        // Insert some data
        
        $handle = fopen(getcwd().'\database\migrations\cupOfTheWorld5.csv', 'r');
            if ($handle) {
                while ($line = fgetcsv($handle,1000,",")) {
                    DB::table('cup_of_the_world5')->insert(
                        array(
                            'position' => $line[0],
                            'name' => $line[1],
                            'country' => $line[2],
                            'result' => $line[3],
                            'type' => $line[4]
                        )
                    );
                }
            }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cup_of_the_world5');
    }
}
