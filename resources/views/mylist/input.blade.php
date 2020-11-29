@extends('layouts.app')

{{-- JSの定義 --}}
@section('js')
@parent
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('js/tinymce/tinymce_setting.js') }}"></script>
<script>

</script>
@stop

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

                        {{ Form::model( $showData, ['method' => 'POST', 'url' => url("mylist/edit/{$showData->id}") ] ) }}

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
                                                    $yearList = ["" => "----"] + AnimeConst::getYearList();
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
                                                    $courList = ["" => "----"] + \AnimeConst::COUR_LIST;
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
                                                    $channelList = ["" => "----"] + \AnimeConst::CHANNEL_LIST;
                                                    ?>
                                                    {{ Form::select( 'channel', \AnimeConst::CHANNEL_LIST, null, ['class' => 'form-control'] ) }}
                                                </td>
                                            </tr>

                                            {{-- 放送曜日 --}}
                                            <tr>
                                                <th class="input-box-th">放送曜日 <span class="required">※</span></th>
                                                <td>
                                                    <?php
                                                    // 放送曜日のリスト
                                                    $weekList = ["" => "----"] + \AnimeConst::WEEL_LIST;
                                                    ?>
                                                    {{ Form::select( 'onair_weekday_num', $weekList, null, ['class' => 'form-control'] ) }}
                                                </td>
                                            </tr>

                                            {{-- 放送時間 --}}
                                            <tr>
                                                <th class="input-box-th">放送時間 <span class="required">※</span></th>
                                                <td>
                                                    <?php
                                                    // 値が空でないとき
                                                    if( !empty( $showData->onair_time ) ){
                                                        // 表示日付のフォーマットを整える
                                                        $showData->onair_time = date( "H:i", strtotime( $showData->onair_time ) );
                                                    }
                                                    ?>
                                                    {!! Form::text( 'onair_time', null, ['class' => 'form-control', 'placeholder' => '00:00'] ) !!}
                                                </td>
                                            </tr>

                                            {{-- 放送開始日 --}}
                                            <tr>
                                                <th class="input-box-th">放送開始日 <span class="required">※</span></th>
                                                <td>
                                                    {!! Form::text( 'onair_start_date', null, ['class' => 'form-control datepicker', 'placeholder' => '2020-10-10'] ) !!}
                                                </td>
                                            </tr>

                                            {{-- 評価 --}}
                                            <tr>
                                                <th class="input-box-th">評価</th>
                                                <td>
                                                    <div class="range-group">
                                                        {{ Form::input( 'number', 'star_review', null, ['min' => "1", 'max' => "5", 'class' => "input-range"] ) }}
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- コメント --}}
                                            <tr>
                                                <th class="input-box-th">コメント</th>
                                                <td>
                                                    {!! Form::textarea( 'comment', null, ['class' => 'form-control', 'id' => 'tinymce'] ) !!}
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
