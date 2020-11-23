<?php

namespace App\Http\Controllers\Account;

use App\User;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\tInitSearch;

/**
 * アカウント画面用コントローラー
 *
 * @author 江澤
 *
 */
class AccountController extends Controller{
    
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
     * 画面固有の初期条件設定
     *
     * @return array
     */
    public function extendSearchParams(){
        $search = [];

        return $search;
    }

    #######################
    ## Controller method
    #######################

    /**
     * ホーム画面を表示する
     */
    public function index( SearchRequest $req ){
        $showData = [];
        $showData = User::get();

        return view(
            'account.list',
            compact(
                'showData'
            )
        );
    }
    
    #######################
    ## 追加画面
    #######################

    /**
     * 登録画面を開く時の画面
     * @return [type] [description]
     */
    public function getCreate() {
        // アカウントモデルオブジェクトを取得
        $showData = new User();

        return view(
            'account.input',
            compact(
                'showData'
            )
        )
        ->with( "title", "アカウント／登録" )
        ->with( "type", "create" );
    }

    /**
     * 値の登録処理
     * @param  UserRequest $requestObj [description]
     * @return [type]                  [description]
     */
    public function postCreate( UserRequest $requestObj ) {
        // 追加する値の配列を取得
        $setValues = $requestObj->all();
        // パスワードを暗号化
        $setValues['password'] = \Hash::make( $setValues['user_password'] );
        // 登録処理
        User::create( $setValues );
        // 一覧へリダイレクト
        return redirect('account');
    }
    
    #######################
    ## 編集画面
    #######################

    /**
     * 編集画面を開く時の画面
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getEdit( $id ){
        // アカウントモデルオブジェクトを取得
        $showData = User::findOrFail( $id );
        
        return view(
            'account.input',
            compact(
                'showData'
            )
        )
        ->with( "title", "アカウント／編集" )
        ->with( "type", "edit" )
        ->with( "buttonId", 'update-button' );
    }
    
    /**
     * 編集画面で入力された値を登録
     * @param  [type]      $id         [description]
     * @param  UserRequest $requestObj [description]
     * @return [type]                  [description]
     */
    public function postEdit( $id, UserRequest $requestObj ) {
        // アカウントモデルオブジェクトを取得
        $UserObj = User::findOrFail( $id );
        // 追加する値の配列を取得
        $setValues = $requestObj->all();
        // パスワードを暗号化
        $setValues['password'] = \Hash::make( $setValues['user_password'] );
        // 更新処置
        $UserObj->update( $setValues );
        // 一覧へリダイレクト
        return redirect('account');
    }

    #######################
    ## 確認画面
    #######################

    /**
     * 編集画面を開く時の画面
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getDetail( $id ){
        // アカウントモデルオブジェクトを取得
        $showData = User::findOrFail( $id );
        
        return view(
            'account.detail',
            compact(
                'showData'
            )
        )
        ->with( "title", "アカウント／確認" );
    }

    #######################
    ## 削除
    #######################

    /**
     * 編集画面で入力された値を登録
     * @param  [type]      $id         [description]
     * @return [type]                  [description]
     */
    public function getDelete( $id ) {
        // アカウントモデルオブジェクトを取得
        $UserObj = User::findOrFail( $id );
        // ソフトデリート
        $UserObj->delete();
        // 一覧へリダイレクト
        return redirect('account');
    }

}
