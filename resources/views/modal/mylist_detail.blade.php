<div class="modal fade" id="modal1" tabindex="-1"
      role="dialog" aria-labelledby="anime-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">マイリスト詳細</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- お気に入り解除用フォーム --}}
        <form id="myform" action="{{ url('mylist/cancel') }}" method="get">
            <input type="hidden" name="anime_id">
        </form>

        {{-- タイトル --}}
        <h5 id="anime-title"></h5>
        {{-- お気に入り解除用フォーム --}}
        
        {{-- 公式サイトURL --}}
        公式サイトURL：
        <a id="anime-url" target="_blank"></a>
        <br>

        {{-- 放送チャンネル --}}
        放送チャンネル：
        <span id="channel"></span>
        <br>

        {{-- 放送曜日 --}}
        放送曜日：
        <span id="onair_weekday_num"></span>
        <br>

        {{-- 放送時間 --}}
        放送時間：
        <span id="onair_time"></span>
        <br>

        {{-- 評価 --}}
        評価：
        <span id=""></span>
        <br>

        {{-- コメント --}}
        コメント：
        <span id="comment"></span>
        <br>

      </div>

      {{-- 各種ボタンを表示 --}}
      <div class="modal-footer">
        <a id="edit-link" class="btn btn-warning">編集</a>
        <a href="javascript:void(0);" onclick="modal_confirm();" class="btn btn-primary">お気に入り解除</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>