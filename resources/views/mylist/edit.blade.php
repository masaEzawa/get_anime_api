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

                        <form action="">

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered tbl-txt-center tbl-input-line">
                                        <tbody>

                                            {{-- イベント名 --}}
                                            <tr>
                                                <th class="input-box-th">イベント名 <span class="required">※</span></th>
                                                <td>
                                                    {!! Form::text( 'name', null, ['class' => 'form-control'] ) !!}
                                                </td>
                                            </tr>


                                            {{-- 備考 --}}
                                            <tr>
                                                <th class="input-box-th">備考</th>
                                                <td>
                                                    {!! Form::textarea( 'memo', null, ['class' => 'form-control'] ) !!}
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
                        
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
