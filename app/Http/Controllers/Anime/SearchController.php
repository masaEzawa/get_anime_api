<?php

namespace App\Http\Controllers\Anime;

use App\Models\Animes;
use App\Http\Requests\SearchRequest;
use App\Http\Controllers\Controller;

/**
 * アニメ検索用のコントローラー
 */
class SearchController extends Controller
{
    /**
     * インスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        // ログイン状態の判定
        $this->middleware('auth');
    }

    // ホーム画面を表示する
    public function index( SearchRequest $req ){

        $search = $req->all();
        
        // 現在年の取得
        $nowYear = date( 'Y' );
        // 年の指定
        if( empty( $search['year'] ) ){
            $search['year'] = $nowYear;
        }

        // リクエストオブジェクトを取得
        $req = SearchRequest::getInstance( $search );

        // アニメデータの取得
        $showData = Animes::whereRequest( $req )
                        ->orderby( 'created_at', 'asc' )
                        ->get();

        return view(
            'search',
            compact(
                'showData',
                'search'
            )
        );
    }

}
