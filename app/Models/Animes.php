<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animes extends Model
{
    use SoftDeletes;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'animes';

    protected $fillable = [
        'id', // ID
        'title', // タイトル
        'title_short1', // タイトル略称1
        'title_short2', // タイトル略称2
        'title_short3', // タイトル略称3
        'public_url', // 公式サイトURL
        'twitter_account', // twitterアカウントID
        'twitter_hash_tag', // twitterハッシュタグ
        'year', // 年
        'cours_id' // クールID
    ];
}
