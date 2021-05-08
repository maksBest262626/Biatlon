<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CupOfTheIBU extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cup_of_the_IBU', function (Blueprint $table) {
            $table->id();
            $table->string('etap');
            $table->string('position');
            $table->string('name');
            $table->string('country');
            $table->string('result');
            $table->string('type');
            $table->timestamps();
        });

        // Insert some data
        
        $handle = fopen(getcwd().'\database\migrations\cupOfIBU1.csv', 'r');
        if ($handle) {
            while ($line = fgetcsv($handle,1000,",")) {
                DB::table('cup_of_the_IBU')->insert(
                    array(
                        'etap' => 1,
                        'position' => $line[0],
                        'name' => $line[1],
                        'country' => $line[2],
                        'result' => $line[3],
                        'type' => $line[4]
                    )
                );
            }
        }

        $handle = fopen(getcwd().'\database\migrations\cupOfIBU2.csv', 'r');
        if ($handle) {
            while ($line = fgetcsv($handle,1000,",")) {
                DB::table('cup_of_the_IBU')->insert(
                    array(
                        'etap' => 2,
                        'position' => $line[0],
                        'name' => $line[1],
                        'country' => $line[2],
                        'result' => $line[3],
                        'type' => $line[4]
                    )
                );
            }
        }

        $handle = fopen(getcwd().'\database\migrations\cupOfIBU3.csv', 'r');
        if ($handle) {
            while ($line = fgetcsv($handle,1000,",")) {
                DB::table('cup_of_the_IBU')->insert(
                    array(
                        'etap' => 3,
                        'position' => $line[0],
                        'name' => $line[1],
                        'country' => $line[2],
                        'result' => $line[3],
                        'type' => $line[4]
                    )
                );
            }
        }
        
        $handle = fopen(getcwd().'\database\migrations\cupOfIBU4.csv', 'r');
        if ($handle) {
            while ($line = fgetcsv($handle,1000,",")) {
                DB::table('cup_of_the_IBU')->insert(
                    array(
                        'etap' => 4,
                        'position' => $line[0],
                        'name' => $line[1],
                        'country' => $line[2],
                        'result' => $line[3],
                        'type' => $line[4]
                    )
                );
            }
        }   
        
        $handle = fopen(getcwd().'\database\migrations\cupOfIBU5.csv', 'r');
        if ($handle) {
            while ($line = fgetcsv($handle,1000,",")) {
                DB::table('cup_of_the_IBU')->insert(
                    array(
                        'etap' => 5,
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
        Schema::dropIfExists('cup_of_the_IBU');
    }
}
