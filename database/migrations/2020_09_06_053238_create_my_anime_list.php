<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyAnimeList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_anime_list', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // ユーザーID
            $table->integer('anime_id'); // アニメID
            $table->string('title'); // タイトル
            $table->string('public_url')->nullable(); // 公式サイトURL
            $table->string('year'); // 年
            $table->tinyInteger('cours_id'); // クールID
            $table->integer('channel')->nullable(); // 放送チャンネル
            $table->date('onair_start_date')->nullable(); // 放送開始日
            $table->time('onair_time')->nullable(); // 	放送時間
            $table->integer('onair_weekday_num')->nullable(); // 放送曜日
            $table->text('comment')->nullable(); // コメント
            $table->integer('star_review')->nullable(); // スター評価
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
        Schema::dropIfExists('my_anime_list');
    }
}
