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
                    <h3>トップ</h3>
                </div>

                <div class="card-body">

                    <p style="color: white;">上部メニューから選択ください</p>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
