<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('en_title', 100);
            $table->string('nl_title', 100);

            $table->string('slug');

            $table->text('en_intro')->nullable();
            $table->text('nl_intro')->nullable();

            $table->text('en_content')->nullable();
            $table->text('nl_content')->nullable();
            $table->string('template', 500);

            $table->boolean('visible', true);

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
        Schema::dropIfExists('pages');
    }
}
