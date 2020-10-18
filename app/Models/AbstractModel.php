<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelクラスを継承したクラス
 * 他のモデルクラスは、基本的にこのクラスを継承する
 */
class AbstractModel extends Model
{
    ###########################
    ## スコープメソッド(条件式)
    ###########################
    
    /**
     * 値が合致するかの条件文を追加
     * @param  [type] $query [description]
     * @param  [type] $key   [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function scopeWhereMatch( $query, $key, $value ){
        if( !empty( $value ) ) {
            $query->where( $key, $value );
        }
        return $query;
    }

    /**
     * Likeの条件文を追加
     * @param  [type] $query [description]
     * @param  [type] $key   [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function scopeWhereLike( $query, $key, $value ){
        if( !empty( $value ) ) {
            $query->where( $key, 'like', '%'.$value.'%' );
        }
        return $query;
    }

    ###########################
    ## スコープメソッド(並び替え)
    ###########################
    
    /**
     * 複数のorder byを指定するメソッド
     * @param  [type] $query  [description]
     * @param  [type] $orders [description]
     * @return [type]         [description]
     */
    public static function scopeOrderBys( $query, $orders ) {
        if( !empty( $orders ) ) {
            foreach ( $orders as $key => $value ) {
                $query->orderBy( DB::raw($key), $value );
            }
        }
        return $query;
    }
}
