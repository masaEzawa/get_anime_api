@extends('layouts.app')

{{-- JSの定義 --}}
@section('js')
@parent
	<script>
        function modal_open( id, title, url ){
            //
            $('input[name="anime_id"]').val(id);
            //
            $('#anime-title').html( title );
            //
            $('#anime-url').html( url );
            $('#anime-url').attr('href', url);
            // モーダルの表示
            $('#modal1').modal('show');
        }

        function modal_submit(){
            // フォームのサブミット
            $('#myform').submit();
            // モーダルを閉じる
			$('#modal1').modal('hide');
        }
    </script>
@stop

@section('content')

{{-- マイリスト解除用モーダルウィンドウの呼び出し --}}
@include('modal.mylist_cancel')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>お気に入り一覧</h3>
                </div>

                <div class="card-body">

                    <?php
                    $list = [
                        ["title" => "", "url" => ""]
                    ];
                    ?>
                    {{-- データが存在するとき --}}
                    @if( !empty( $showData ) )
                        <ul class="list-inline">
                            @forelse($showData as $key => $value)
                                <li class="list-inline-item list-content bg-white">
                                    <a href="javascript:void(0);" onclick="modal_open( '{{ $value['id'] }}', '{{ $value['title'] }}', '{{ $value['public_url'] }}' );">
                                        {{ $value['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p style="color: white;">データが存在しません。</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
