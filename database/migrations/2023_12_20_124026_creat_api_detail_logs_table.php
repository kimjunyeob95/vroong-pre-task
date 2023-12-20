<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatApiDetailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_detail_logs', function (Blueprint $table) {
            $table->id();
            $table->string('endpoint');
            $table->string('method');
            $table->text('request')->nullable();
            $table->text('response')->nullable();
            $table->string('ip');
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
        //
    }
}
