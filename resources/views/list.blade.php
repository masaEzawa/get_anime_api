@extends('layouts.app')

{{-- JSの定義 --}}
@section('js')
@parent
	<script>
        function modal_open( array ){
            $.ajax({
                type: "GET",
                url: "{{ url( 'mylist/mylistData/' ) }}/" + array.id,
                dataType: 'json',
				// お気に入りに登録されている場合データを取得する
				success: function( data ) {
					// お気に入り登録済みの時
                    if( !$.isEmptyObject(data) ){
                        // モーダルの質問文を変更
                        $('#modal-question').html( 'お気に入りに登録済みです。' );
                        $('#no-add').show();
                        $('#add-btn').hide();
                    }else{
                        // モーダルの質問文を変更
                        $('#modal-question').html( 'お気に入りに追加しますか？' );
                        $('#no-add').hide();
                        $('#add-btn').show();
                    }
                },
				error: function( data ) {

					// console.log(data.errors);
					alert('error');
				}
            })
            // IDの表示
            $('input[name="anime_id"]').val(array.id);
            // タイトルの表示
            $('input[name="title"]').val(array.title);
            $('#anime-title').html( array.title );
            // URLの表示
            $('input[name="public_url"]').val(array.url);
            $('#anime-url').html( array.url );
            $('#anime-url').attr('href', array.url);
            // 年の表示
            $('input[name="year"]').val(array.year);
            // クールIDの表示
            $('input[name="cours_id"]').val(array.cours_id);
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

{{-- マイリスト登録用モーダルウィンドウの呼び出し --}}
@include('modal.mylist_add')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>最新一覧</h3>
                    
                    {{-- 検索部分の呼び出し --}}
                    @include('search_box')
                    
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
                                    <a href="javascript:void(0);" onclick="modal_open( {id:'{{ $value['id'] }}', title:'{{ $value['title'] }}', url:'{{ $value['public_url'] }}', year:'{{ $value['year'] }}', cours_id:'{{ $value['cours_id'] }}' });">
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
