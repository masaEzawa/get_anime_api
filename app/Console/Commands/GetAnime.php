<?php

namespace App\Console\Commands;

use App\Models\Animes;
use Illuminate\Console\Command;

class GetAnime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getanime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // APIのURLを格納
        $url = "https://api.moemoe.tokyo/anime/v1/master/";
        // 年の配列
        $yearList = [];
        // 2014年から現在年まで取得
        for( $year=2014; $year<=date('Y'); $year++ ){
            $yearList[] = $year;
        }
        // クールのリスト
        $courList = [1, 2, 3, 4];
        // API空のデータを格納
        $getData = [];
        // タイムスタンプのカラム
        $timestampList = ['created_at', 'updated_at'];
        // 除外するカラム
        $exclusionList = ['sex', 'sequel', 'city_code', 'city_name', 'product_companies'];

        // 年のループ
        foreach ($yearList as $yKey => $year) {
            // クールのループ
            foreach ($courList as $cKey => $cour) {
                // APIのURLを生成
                $apiUrl = $url . $year . "/" . $cour;
                // APUを実行し、JSONデータを取得
                $getJsonData = file_get_contents( $apiUrl );
                // APIのデータがあるとき
                if( isset( $getJsonData ) == True ){
                    // JSONデータを配列に格納
                    $getDatas = json_decode( $getJsonData, True );

                    // APIデータが配列の時
                    if( isset( $getDatas ) == True && is_array( $getDatas ) == True ){
                        foreach ($getDatas as $key => $value) {
                            // 対象カラムの除外
                            foreach( $exclusionList as $exclusion ){
                                unset( $value[$exclusion] );
                            }
                            // 日付カラムの成型
                            foreach( $timestampList as $timestamp ){
                                $value[$timestamp] = str_replace( "T", " ", $value[$timestamp] );
                                $value[$timestamp] = str_replace( "Z", "", $value[$timestamp] );
                            }

                            // データの更新or登録
                            Animes::updateOrInsert(
                                ['id' => $value['id']],
                                $value
                            );
                        }
                    }else{
                        echo "エラー：データの形式が正しくありません。";
                        exit();
                    }
                    
                }else{
                    echo "エラー：データが取得できませんでした。";
                    exit();
                }
            }
        }

    }

    public function http_get_contents( $url )
    {
        $ch = curl_init();
		// オプション
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		if (isset($_SERVER['HTTP_REFERER'])) {
		curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_REFERER']);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// クッキーヘッダー
		$cookie_header = "Cookie:";
		$headers = [];
		foreach($_COOKIE as $key => $value) {
			$cookie_header .= " {$key}={$value};";
		}
		$headers[] = $cookie_header;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// 実行
		$retval = curl_exec($ch);
		//var_dump($retval);

		if (curl_errno($ch)) {
			return 'Request Error: ' . curl_error($ch);
		}

		curl_close($ch);

		if (FALSE === $retval) {
			return FALSE;
		} else {
			return $retval;
		}
    }
}
