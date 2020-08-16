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
            $table->bigInteger('id')->unique(); // ID
            $table->string('title'); // タイトル
            $table->string('title_short1'); // タイトル略称1
            $table->string('title_short2')->nullable(); // タイトル略称2
            $table->string('title_short3')->nullable(); // タイトル略称3
            $table->string('public_url'); // 公式サイトURL
            $table->string('twitter_account')->nullable(); // twitterアカウントID
            $table->string('twitter_hash_tag')->nullable(); // twitterハッシュタグ
            $table->string('year'); // 年
            $table->tinyInteger('cours_id'); // クールID
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
