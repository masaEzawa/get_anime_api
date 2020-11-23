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
                    <h3>アカウント詳細</h3>
                </div>

                <div class="card-body">
                    <div class="input-box">
                    
                        <p class="required">※は必須項目です。</p>
                
                        {{-- エラーメッセージ --}}
                        @include('errors.list')

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered tbl-txt-center tbl-input-line">
                                    <tbody>

                                        {{-- 名前 --}}
                                        <tr>
                                            <th class="input-box-th">名前 <span class="required">※</span></th>
                                            <td class="bg-white list_td">
                                                {{ $showData->name }}
                                            </td>
                                        </tr>

                                        {{-- メールアドレス --}}
                                        <tr>
                                            <th class="input-box-th">メールアドレス <span class="required">※</span></th>
                                            <td class="bg-white list_td">
                                                {{ $showData->email }}
                                            </td>
                                        </tr>

                                        {{-- パスワード --}}
                                        <tr>
                                            <th class="input-box-th">パスワード <span class="required">※</span></th>
                                            <td class="bg-white list_td">
                                                {{ $showData->user_password }}
                                            </td>
                                        </tr>

                                        {{-- 権限 --}}
                                        <tr>
                                            <th class="input-box-th">メールアドレス <span class="required">※</span></th>
                                            <td class="bg-white list_td">
                                                {{ UserConst::getlevel( $showData->user_level ) }} 
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

                            <div class="col-md-2">
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
