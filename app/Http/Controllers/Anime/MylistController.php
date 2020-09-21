<?php

namespace App\Http\Controllers\Anime;

use App\Models\MyAnimeList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function index(){
        // お気に入りデータの取得
        $showData = MyAnimeList::joinAnimes()
                            ->where( 'user_id', Auth::id() )
                            ->get();

        return view(
            'mylist',
            compact(
                'showData'
            )
        );
    }

    /**
     * お気に入りを追加する
     */
    public function getCreate( Request $req ){
        // DB登録用の配列を定義
        $setData = [];
        // ユーザーIDを取得する
        $setData['user_id'] = Auth::id();
        // リクエストを取得する
        $setData['anime_id'] = $req->anime_id;
        // DBに登録する
        MyAnimeList::create( $setData );

        return redirect('mylist');

    }

    /**
     * お気に入りを解除する
     */
    public function getCancel( Request $req ){
        // 指定したIDのお気に入りを取得する
        $myAnimeList = MyAnimeList::where( 'anime_id', $req->anime_id )
                    ->firstOrFail();

        // データの削除
        $myAnimeList->delete();

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

        return response()->json( $myAnimeList );
    }

}
