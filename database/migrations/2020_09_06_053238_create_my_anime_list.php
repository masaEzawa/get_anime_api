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
            $table->integer('user_id')->comment('ユーザーID'); // ユーザーID
            $table->integer('anime_id')->comment('アニメID'); // アニメID
            $table->string('title')->comment('タイトル'); // タイトル
            $table->string('public_url')->nullable()->comment('公式サイトURL'); // 公式サイトURL
            $table->string('year')->comment('年'); // 年
            $table->tinyInteger('cours_id')->comment('クールID'); // クールID
            $table->integer('channel')->nullable()->comment('放送チャンネル'); // 放送チャンネル
            $table->date('onair_start_date')->nullable()->comment('放送開始日'); // 放送開始日
            $table->time('onair_time')->nullable()->comment('放送時間'); // 放送時間
            $table->integer('onair_weekday_num')->nullable()->comment('放送曜日'); // 放送曜日
            $table->text('comment')->nullable()->comment('コメント'); // コメント
            $table->integer('star_review')->nullable()->comment('スター評価'); // スター評価
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
