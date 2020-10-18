<?php

namespace App\Consts;

/**
 * アニメ用の定数クラス
 */
class AnimeConst {
    // クールのリスト
    const COUR_LIST = [
        '1' => "冬",
        '2' => "春",
        '3' => "夏",
        '4' => "秋",
    ];

    // 放送チャンネルのリスト
    const CHANNEL_LIST = [
        '9' => "9: TOKYO MX",
        '3' => "3: チバテレビ",
        '4' => "4: 日本テレビ",
        '5' => "5: テレビ朝日",
        '6' => "6: TBS",
        '7' => "7: テレビ東京",
        '8' => "8: フジテレビ",
    ];

    // 放送曜日のリスト
    const WEEL_LIST = [
        "0" => '日', // 0
        "1" => '月', // 1
        "2" => '火', // 2
        "3" => '水', // 3
        "4" => '木', // 4
        "5" => '金', // 5
        "6" => '土'  // 6
    ];

    /**
     * 年のリストを取得する関数
     * @target 年の指定 +-
     * @minYear
     */
    public static function getYearList( $target='+1', $minYear=2014 ){
        $yearList = [];
        for( $year=date('Y' , strtotime( $target . ' year') ); $year>=2014; $year-- ){
            $yearList[$year] = $year;
        }
        return $yearList;
    }
}

?>