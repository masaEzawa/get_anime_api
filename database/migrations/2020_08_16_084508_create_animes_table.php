<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->bigInteger('id')->unique();
            $table->string('title');
            $table->string('title_short1');
            $table->string('title_short2')->nullable();
            $table->string('title_short3')->nullable();
            $table->string('public_url');
            $table->string('twitter_account')->nullable();
            $table->string('twitter_hash_tag')->nullable();
            $table->tinyInteger('cours_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animes');
    }
}
