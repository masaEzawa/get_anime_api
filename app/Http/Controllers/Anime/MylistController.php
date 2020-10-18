<?php

namespace App\Http\Controllers\Anime;

use App\Models\MyAnimeList;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\MylistRequest;
use App\Http\Controllers\Controller;
use Auth;

/**
 * お気に入り画面用のコントローラー
 */
class MylistController extends Controller
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

    /**
     * ホーム画面を表示する
     */
    public function index( SearchRequest $req ){
        $search = $req->all();
        // 現在年の取得
        $nowYear = date( 'Y' );
        // 検索されていないとき
        if( empty( $search ) ){
            // 年の指定
            $search['year'] = $nowYear;
  
            /**
             * クールの指定
             */
            // 現在月が冬の判定
            if( in_array( date( 'm' ), [1, 2, 3] ) ){
                $search['cours_id'] = 1;
            // 現在月が春の判定
            }else if( in_array( date( 'm' ), [4, 5, 6] ) ){
                $search['cours_id'] = 2;
            // 現在月が夏の判定
            }else if( in_array( date( 'm' ), [7, 8, 9] ) ){
                $search['cours_id'] = 3;
            // 現在月が秋の判定
            }else{
                $search['cours_id'] = 4;
            }
        }
        // リクエストオブジェクトを取得
        $req = SearchRequest::getInstance( $search );
        $sort = [
            'onair_weekday_num' => 'asc', // 放送曜日
            'onair_time' => 'asc', // 放送時間
        ];
        // お気に入りデータの取得
        $showData = MyAnimeList::whereRequest( $req )
                            ->where( 'user_id', Auth::id() )
                            ->orderBys( $sort )
                            ->get();
        return view(
            'mylist.list',
            compact(
                'search',
                'showData'
            )
        );
    }

    /**
     * お気に入りを追加する
     */
    public function getCreate( SearchRequest $req ){
        // DB登録用の配列を定義
        $setData = [];
        // ユーザーIDを取得する
        $setData['user_id'] = Auth::id();
        // リクエストを取得する
        $setData['anime_id'] = $req->anime_id;
        $setData['title'] = $req->title;
        $setData['public_url'] = $req->public_url;
        $setData['year'] = $req->year;
        $setData['cours_id'] = $req->cours_id;
        // DBに登録する
        MyAnimeList::create( $setData );

        return redirect('mylist');

    }

    /**
     * お気に入りを解除する
     */
    public function getCancel( SearchRequest $req ){
        // 指定したIDのお気に入りを取得する
        $myAnimeList = MyAnimeList::where( 'anime_id', $req->anime_id )
                    ->firstOrFail();

        // データの削除
        $myAnimeList->delete();
        // 一覧へリダイレクト
        return redirect('mylist');
    }

    /**
     * お気に入りの編集画面を開く
     */
    public function getEdit( $id ){
        // お気に入りデータの取得
        $showData = MyAnimeList::findOrFail( $id );

        return view(
            'mylist.input',
            compact(
                'showData'
            )
        );
    }

    /**
     * お気に入りを編集する
     */
    public function postEdit( $id, MylistRequest $req ){
        $setData = $req->all();
        // お気に入りモデルのオブジェクトを取得
        $MyAnimeObj = MyAnimeList::findOrFail( $id );
        // データの更新
        $MyAnimeObj->update( $setData );
        // 一覧へリダイレクト
        return redirect('mylist');
    }

    /**
     * アニメデータの出力する
     */
    public function getMylistData( $anime_id ){
        $myAnimeList = [];
        // 指定したIDのお気に入りを取得する
        $myAnimeList = MyAnimeList::where( 'anime_id', $anime_id )
                    ->first();

        // 放送チャンネルの取得
        if( !empty( $myAnimeList->channel ) ){
            $myAnimeList->channel = \AnimeConst::getChannel( $myAnimeList->channel );
        }
        // 放送曜日の取得
        if( !empty( $myAnimeList->onair_weekday_num ) ){
            $myAnimeList->onair_weekday_num = \AnimeConst::getWeek( $myAnimeList->onair_weekday_num );
        }
        // JSONを返す
        return response()->json( $myAnimeList );
    }

}
