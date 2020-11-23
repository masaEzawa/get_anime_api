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
            $table->bigInteger('id')->unique()->comment('ID'); // ID
            $table->string('title')->comment('タイトル'); // タイトル
            $table->string('title_short1')->comment('タイトル略称1'); // タイトル略称1
            $table->string('title_short2')->nullable()->comment('タイトル略称2'); // タイトル略称2
            $table->string('title_short3')->nullable()->comment('タイトル略称3'); // タイトル略称3
            $table->string('public_url')->comment('公式サイトURL'); // 公式サイトURL
            $table->string('twitter_account')->nullable()->comment('twitterアカウントID'); // twitterアカウントID
            $table->string('twitter_hash_tag')->nullable()->comment('twitterハッシュタグ'); // twitterハッシュタグ
            $table->string('year')->comment('年'); // 年
            $table->tinyInteger('cours_id')->comment('クールID'); // クールID
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
