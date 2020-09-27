@extends('layouts.app')

{{-- JSの定義 --}}
@section('js')
@parent
	<script>
        function modal_open( id, anime_id, title, url ){
            //
            $('input[name="anime_id"]').val(anime_id);
            //
            $('#anime-title').html( title );
            //
            $('#anime-url').html( url );
            $('#anime-url').attr('href', url);
            // モーダルの表示
            $('#modal1').modal('show');
            // 編集リンクの表示
            $('#edit-link').attr('href', "{{ url( 'mylist/edit/' ) }}/" + id);
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
                                    <a href="javascript:void(0);" onclick="modal_open( '{{ $value['id'] }}', '{{ $value['anime_id'] }}', '{{ $value['title'] }}', '{{ $value['public_url'] }}' );">
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
