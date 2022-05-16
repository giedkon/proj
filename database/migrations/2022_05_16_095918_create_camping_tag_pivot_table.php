<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camping_tag_pivot', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('camping_id')->references('id')->on('campings')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tag_id')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camping_tag_pivot');
    }
};
