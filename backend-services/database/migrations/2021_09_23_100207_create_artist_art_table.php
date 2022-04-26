<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistArtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_art', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->uuid('art_id');
            $table->string('title');
            $table->string('slug');
            $table->text('tags');
            $table->text('description');
            $table->string('art_photo_path');
            $table->foreignId('artwork_media_id');
            $table->boolean('is_mature_content');
            $table->boolean('is_public');
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
        Schema::dropIfExists('artist_art');
    }
}
