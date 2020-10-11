@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>お気に入り編集</h3>
                </div>

                <div class="card-body">
                    <div class="input-box">
                    
                        <p class="required">※は必須項目です。</p>
                
                        {{-- エラーメッセージ --}}
                        @include('errors.list')

                        {{ Form::model( $showData, ['method' => 'GET', 'url' => url('search')] ) }}

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered tbl-txt-center tbl-input-line">
                                        <tbody>

                                            {{-- 年 --}}
                                            <tr>
                                                <th class="input-box-th">年 <span class="required">※</span></th>
                                                <td>
                                                    <?php
                                                    // デフォルトの年を設定
                                                    if( empty( $year ) ){
                                                        $year = date('Y');
                                                    }
                                                    // 年の配列
                                                    $yearList = ["" => "----"];
                                                    // 2014年から現在年まで取得
                                                    for( $year=date('Y' , strtotime('+1 year') ); $year>=2014; $year-- ){
                                                        $yearList[$year] = $year;
                                                    }
                                                    ?>
                                                    {{ Form::select( 'year', $yearList, null, ['class' => 'form-control'] ) }}                    
                                                </td>
                                            </tr>

                                            {{-- クール --}}
                                            <tr>
                                                <th class="input-box-th">クール <span class="required">※</span></th>
                                                <td>
                                                    <?php
                                                    // クールのリスト
                                                    $courList = [
                                                        "" => "----",
                                                        '1' => "冬",
                                                        '2' => "春",
                                                        '3' => "夏",
                                                        '4' => "秋",
                                                    ];
                                                    ?>
                                                    {{ Form::select( 'cours_id', $courList, null, ['class' => 'form-control'] ) }}
                                                </td>
                                            </tr>

                                            {{-- 番組名 --}}
                                            <tr>
                                                <th class="input-box-th">番組名 <span class="required">※</span></th>
                                                <td>
                                                    {!! Form::text( 'title', null, ['class' => 'form-control'] ) !!}
                                                </td>
                                            </tr>

                                            {{-- 放送チャンネル --}}
                                            <tr>
                                                <th class="input-box-th">放送チャンネル <span class="required">※</span></th>
                                                <td>
                                                    <?php
                                                    // 放送チャンネルのリスト
                                                    $channelList = [
                                                        "" => "----",
                                                        '9' => "9: TOKYO MX",
                                                        '3' => "3: チバテレビ",
                                                        '4' => "4: 日本テレビ",
                                                        '5' => "5: テレビ朝日",
                                                        '6' => "6: TBS",
                                                        '7' => "7: テレビ東京",
                                                        '8' => "8: フジテレビ",
                                                    ];
                                                    ?>
                                                    {{ Form::select( 'channel', $channelList, null, ['class' => 'form-control'] ) }}
                                                </td>
                                            </tr>

                                            {{-- 放送曜日 --}}
                                            <tr>
                                                <th class="input-box-th">放送曜日 <span class="required">※</span></th>
                                                <td>
                                                    <?php
                                                    // 放送曜日のリスト
                                                    $weekList = [
                                                        "" => "----",
                                                        "0" => '日', // 0
                                                        "1" => '月', // 1
                                                        "2" => '火', // 2
                                                        "3" => '水', // 3
                                                        "4" => '木', // 4
                                                        "5" => '金', // 5
                                                        "6" => '土'  // 6
                                                    ];
                                                    ?>
                                                    {{ Form::select( 'onair_weekday_num', $weekList, null, ['class' => 'form-control'] ) }}
                                                </td>
                                            </tr>

                                            {{-- 放送時間 --}}
                                            <tr>
                                                <th class="input-box-th">放送時間 <span class="required">※</span></th>
                                                <td>
                                                    {!! Form::text( 'onair_time', null, ['class' => 'form-control', 'placeholder' => '00:00'] ) !!}
                                                </td>
                                            </tr>

                                            {{-- 放送開始日 --}}
                                            <tr>
                                                <th class="input-box-th">放送開始日 <span class="required">※</span></th>
                                                <td>
                                                    {!! Form::text( 'onair_start_date', null, ['class' => 'form-control', 'placeholder' => '2020-10-10'] ) !!}
                                                </td>
                                            </tr>

                                            {{-- 評価 --}}
                                            <tr>
                                                <th class="input-box-th">評価</th>
                                                <td>
                                                   5段階評価
                                                </td>
                                            </tr>

                                            {{-- コメント --}}
                                            <tr>
                                                <th class="input-box-th">コメント</th>
                                                <td>
                                                    {!! Form::textarea( 'memo', null, ['class' => 'form-control'] ) !!}
                                                </td>
                                            </tr>

                                            {{-- 公式サイトURL --}}
                                            <tr>
                                                <th class="input-box-th">公式サイトURL</th>
                                                <td>
                                                    {!! Form::text( 'public_url', null, ['class' => 'form-control'] ) !!}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="row">

                                {{-- 戻るボタン --}}
                                <div class="col-md-2">
                                    <button type="button" onClick="location.href ='{{ url('mylist') }}'" class="btn btn-warning btn-block btn-embossed">
                                        <i class="fa fa-mail-reply"></i> 戻る
                                    </button>
                                </div>

                                {{-- 確認画面 --}}
                                <div class="col-md-4 offset-2">
                                    {!! Form::submit( '編集', ['class' => 'btn btn-info btn-block btn-embossed']) !!}
                                </div>

                                <div class="col-md-2">
                                </div>
                            </div>
                        
                        {{ Form::close() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
