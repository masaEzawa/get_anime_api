<?php

namespace App\Models;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * アニメお気に入り用テーブルのモデルクラス
 */
class MyAnimeList extends AbstractModel
{
    use SoftDeletes;

    // テーブル名
    protected $table = 'my_anime_list';

    // 更新を行うカラム
    protected $fillable = [
        'user_id', // ユーザーID
        'anime_id', // アニメjoinAnimesID
        'title', // タイトル
        'public_url', // 公式サイトURL
        'year', // 年
        'cours_id', // クールID
        'channel', // 放送チャンネル
        'onair_start_date', // 放送開始日
        'onair_time', // 放送時間
        'onair_weekday_num', // 放送曜日
        'comment', // コメント
        'star_review', // スター評価
    ];

    /**
     * アニメテーブルとJoinするスコープメソッド
     */
    public function scopeJoinAnimes( $query ){
        return $query->leftJoin( 'animes', 'my_anime_list.anime_id', '=', 'animes.id' );
    }
}
