<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * アニメお気に入り用テーブルのモデルクラス
 */
class MyAnimeList extends Model
{
    use SoftDeletes;

    // テーブル名
    protected $table = 'my_anime_list';

    // 更新を行うカラム
    protected $fillable = [
        'user_id', // ユーザーID
        'anime_id', // アニメjoinAnimesID
    ];

    /**
     * アニメテーブルとJoinするスコープメソッド
     */
    public function scopeJoinAnimes( $query ){
        return $query->leftJoin( 'animes', 'my_anime_list.anime_id', '=', 'animes.id' );
    }
}
