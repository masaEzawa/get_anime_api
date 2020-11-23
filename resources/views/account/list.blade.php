@extends('layouts.app')

{{-- JSの定義 --}}
@section('js')
@parent
@stop

@section('content')

{{-- マイリスト登録用モーダルウィンドウの呼び出し --}}
@include('modal.mylist_add')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>アカウント一覧</h3>
                    
                    <div class="row">
                        <div class="col-md-12">
                            {{-- 新規追加 --}}
                            <div class="col-md-4">
                                <a href="{{ url('account/create') }}" class="login_btn btn btn-block">新規追加</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered tbl-txt-center tbl-input-line">
                                <thead>
                                    <th class="color-white list_th">名前</th>
                                    <th class="color-white list_th">メールアドレス</th>
                                    <th class="color-white list_th">パスワード</th>
                                    <th class="color-white list_th">権限</th>
                                    <th class="color-white list_th">操作</th>
                                </thead>
                                <tbody>
                                    {{-- データが存在するとき --}}
                                    @forelse( $showData as $key => $value )
                                        <tr>
                                            {{-- 名前 --}}
                                            <td class="bg-white list_td">
                                                {{ $value->name }}
                                            </td>
                                            {{-- メールアドレス --}}
                                            <td class="bg-white list_td">
                                                {{ $value->email }}
                                            </td>
                                            {{-- パスワード --}}
                                            <td class="bg-white list_td">
                                                {{ $value->user_password }}
                                            </td>
                                            {{-- 権限 --}}
                                            <td class="bg-white list_td">
                                                @if( !empty( $value->user_level ) == True )
                                                    {{ UserConst::getlevel( $value->user_level ) }}
                                                @endif
                                            </td>
                                            {{-- 操作 --}}
                                            <td class="bg-white list_td">
                                                {{-- 詳細 --}}
                                                <a href="{{ url('account/detail/' . $value->id ) }}" title="詳細">
                                                    <i class="fui-search"></i>
                                                </a>
                                                {{-- 編集 --}}
                                                <a href="{{ url('account/edit/' . $value->id ) }}" title="編集">
                                                    <i class="fui-new"></i>
                                                </a>
                                                {{-- 削除 --}}
                                                <a href="{{ url('account/delete/' . $value->id ) }}" onclick="return confirm('本当に削除してよろしいでしょうか？');" title="削除">
                                                    <i class="fui-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="4" class="bg-white list_td">データが存在しません。</td>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
