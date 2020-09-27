@extends('layouts.app')

{{-- JSの定義 --}}
@section('js')
@parent
	<script>
        function modal_open( id, title, url ){
            $.ajax({
                type: "GET",
                url: "{{ url( 'mylist/mylistData/' ) }}/" + id,
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
            $('input[name="anime_id"]').val(id);
            // タイトルの表示
            $('#anime-title').html( title );
            // URLの表示
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

{{-- マイリスト登録用モーダルウィンドウの呼び出し --}}
@include('modal.mylist_add')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>最新一覧</h3>
                    <div class="row">
                        <div class="col-md-12">
                        {{ Form::model( $search, ['method' => 'GET', 'url' => url('search')] ) }}
                            <table class="table">
                                <tr>
                                    <th class="color-white">年</th>
                                    <td>
                                        <?php
                                        // 年の配列
                                        $yearList = ["" => ""];
                                        // 2014年から現在年まで取得
                                        for( $year=date('Y'); $year>=2014; $year-- ){
                                            $yearList[$year] = $year;
                                        }
                                        ?>
                                        {{ Form::select( 'year', $yearList, null, ['class' => 'form-control'] ) }}
                                    </td>

                                    <th class="color-white">クール</th>
                                    <td>
                                        <?php
                                        // クールのリスト
                                        $courList = [
                                            "" => "",
                                            '1' => "冬",
                                            '2' => "春",
                                            '3' => "夏",
                                            '4' => "秋",
                                        ];
                                        ?>
                                        {{ Form::select( 'cours_id', $courList, null, ['class' => 'form-control'] ) }}
                                    </td>

                                    <th class="color-white">タイトル</th>
                                    <td>
                                        <input type="text" name="title" class="form-control">
                                    </td>
                                </tr>
                            </table>

                            <div class="col-md-3 offset-5">
                                <button type="submit" class="login_btn btn btn-block">検索</button>
                            </div>
                        {{ Form::close() }}
                        </div>
                    </div>
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