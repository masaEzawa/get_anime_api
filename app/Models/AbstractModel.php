<?php

namespace App\Models;

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
}
