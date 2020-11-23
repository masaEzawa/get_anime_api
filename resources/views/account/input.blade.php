@extends('layouts.app')

{{-- JSの定義 --}}
@section('js')
@parent
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>アカウント登録</h3>
                </div>

                <div class="card-body">
                    <div class="input-box">
                    
                        <p class="required">※は必須項目です。</p>
                
                        {{-- エラーメッセージ --}}
                        @include('errors.list')

                        {{-- 編集の時 --}}
                        @if( $type == "edit" )
                        {{ Form::model( $showData, ['method' => 'POST', 'url' => url("account/edit/{$showData->id}") ] ) }}
                        @else
                        {{ Form::model( $showData, ['method' => 'POST', 'url' => url("account/create") ] ) }}
                        @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered tbl-txt-center tbl-input-line">
                                        <tbody>

                                            {{-- 名前 --}}
                                            <tr>
                                                <th class="input-box-th">名前 <span class="required">※</span></th>
                                                <td>
                                                    {!! Form::text( 'name', null, ['class' => 'form-control'] ) !!}
                                                </td>
                                            </tr>

                                            {{-- メールアドレス --}}
                                            <tr>
                                                <th class="input-box-th">メールアドレス <span class="required">※</span></th>
                                                <td>
                                                    {!! Form::text( 'email', null, ['class' => 'form-control'] ) !!}
                                                </td>
                                            </tr>

                                            {{-- パスワード --}}
                                            <tr>
                                                <th class="input-box-th">パスワード <span class="required">※</span></th>
                                                <td>
                                                    {!! Form::text( 'user_password', null, ['class' => 'form-control'] ) !!}
                                                </td>
                                            </tr>

                                            {{-- 権限 --}}
                                            <tr>
                                                <th class="input-box-th">メールアドレス <span class="required">※</span></th>
                                                <td>
                                                    <?php
                                                    // 権限のリスト
                                                    $levelList = ["" => "----"] + UserConst::LEVEL_LIST;
                                                    ?>
                                                    {{ Form::select( 'user_level', $levelList, null, ['class' => 'form-control'] ) }}                    
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="row">

                                {{-- 戻るボタン --}}
                                <div class="col-md-2">
                                    <button type="button" onClick="location.href ='{{ url('account') }}'" class="btn btn-warning btn-block btn-embossed">
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
