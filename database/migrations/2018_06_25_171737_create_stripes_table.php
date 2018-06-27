<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStripesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('currency')->default('usd');
            $table->enum('interval', ['day', 'week', 'month', 'year'])->default('month');
            $table->string('product')->default('service');
            $table->string('nickname')->unique();
            $table->unsignedInteger('amount');
            $table->text('attributes');
            $table->timestamp('publish_at')->nullable();
            $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('stripes');
    }
}
