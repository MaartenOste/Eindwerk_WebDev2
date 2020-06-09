<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('en_title', 100)->unique();
            $table->text('en_intro')->nullable();
            $table->text('en_content')->nullable();
            $table->string('nl_title', 100)->unique();
            $table->text('nl_intro')->nullable();
            $table->text('nl_content')->nullable();
            $table->string('image')->nullable();
            $table->boolean('visible');
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
        Schema::dropIfExists('news');
    }
}
