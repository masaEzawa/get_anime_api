<?php

namespace App\Consts;

/**
 * ユーザー用の定数クラス
 */
class UserConst {
    // 権限のリスト
    const LEVEL_LIST = [
        '1' => "管理者",
        '2' => "一般",
    ];

    /**
     * 権限を取得する関数
     */
    public static function getlevel( $num=0 ){
        // 一覧を取得
        $levelList = self::LEVEL_LIST;

        if( isset( $levelList[$num] ) == True ){
            return $levelList[$num];
        }

        return $num;
    }

    ######################
    ## ユーザーエージェントの
    ## デバイス判定
    ######################

    /**
     * スマートフォンで開かれたかどうか判定
     */
    public static function isSmartphone(){
        // ユーザーエージェントがスマートフォンのとき
        if( preg_match( "/iPhone|iPod|Android.*Mobile|Windows.*Phone/", $_SERVER['HTTP_USER_AGENT'] ) == True ){
            return True;
        }else{
            return False;
        }
    }
}

?>