<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pages extends Migration
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
            $table->bigInteger('parent_id', false, true)->nullable();
            $table->string('slug', 30);
            $table->string('title', 50);
            $table->text('content')->nullable();
            $table->integer('priority', false, true);
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('pages');
            $table->unique(['id', 'parent_id', 'slug']);
            $table->unique(['id', 'parent_id', 'priority']);
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
