<?php

namespace App\Http\Controllers;

use App\Models\Animes;
use Illuminate\Http\Request;

/**
 * ホーム画面用コントローラー
 */
class HomeController extends Controller
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
    public function index()
    {
        // 現在年の取得
        $nowYear = date( 'Y' );
        // アニメデータの取得
        $showData = Animes::where( 'year', $nowYear )
                        ->orderby( 'created_at', 'asc' )
                        ->get();
        return view(
            'home',
            compact(
                'showData'
            )
        );
    }
}
