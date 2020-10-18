@extends('layouts.app')

{{-- JSの定義 --}}
@section('js')
@parent
	<script>
        function modal_open( id, anime_id ){
            $.ajax({
                type: "GET",
                url: "{{ url( 'mylist/mylistData/' ) }}/" + anime_id,
                dataType: 'json',
				// お気に入りに登録されている場合データを取得する
				success: function( data ) {
                    console.log(data.title);
					// アニメIDを表示
                    $('input[name="anime_id"]').val(anime_id);
                    // タイトルを表示
                    $('#anime-title').html( data.title );
                    // 公式サイトのURLを表示
                    $('#anime-url').html( data.public_url );
                    $('#anime-url').attr('href', data.public_url);
                    // 放送チャンネルを表示
                    $('#channel').html( data.channel );
                    // 放送曜日を表示
                    $('#onair_weekday_num').html( data.onair_weekday_num );
                    // 評価を表示
                    $('#onair_time').html( data.onair_time );
                    // コメントを表示
                    $('#comment').html( data.comment );
                    
                    // 編集リンクの表示
                    $('#edit-link').attr('href', "{{ url( 'mylist/edit/' ) }}/" + id);
                    // モーダルの表示
                    $('#modal1').modal('show');
                },
				error: function( data ) {

					// console.log(data.errors);
					alert('error');
				}
            })
            
        }

        function modal_confirm(){
            var result = confirm('お気に入りを解除してよろしいでしょうか？');
            if( result ){
                modal_submit();
            }
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

{{-- マイリスト詳細用モーダルウィンドウの呼び出し --}}
@include('modal.mylist_detail')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>お気に入り一覧</h3>

                    {{-- 検索部分の呼び出し --}}
                    @include('mylist.search_box')
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
                                    {{-- 詳細リンク --}}
                                    <a href="javascript:void(0);" onclick="modal_open( '{{ $value['id'] }}', '{{ $value['anime_id'] }}' );">
                                        {{-- タイトル --}}
                                        {{ $value['title'] }}
                                        
                                        {{-- 放送チャンネル --}}
                                        @if( !empty( $value['channel'] ) )
                                            <br>
                                            {{ \AnimeConst::getChannel( $value['channel'] ) }}
                                        @endif
                                        {{-- 放送曜日 時間 --}}
                                        @if( !empty( $value['onair_weekday_num'] ) && !empty( $value['onair_time'] ) )
                                            <br>
                                            {{ \AnimeConst::getWeek( $value['onair_weekday_num'] ) }} {{ $value['onair_time'] }}
                                        @endif
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
