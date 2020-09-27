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
        <h5 id="anime-title"></h5>
        <form id="myform" action="{{ url('mylist/cancel') }}" method="get">
            <input type="hidden" name="anime_id">
        </form>
        公式サイトURL：
        <a id="anime-url" target="_blank"></a>
        <br>
        <p></p>
      </div>
      <div class="modal-footer">
        <a id="edit-link" class="btn btn-warning">編集</a>
        <a href="javascript:void(0);" onclick="modal_confirm();" class="btn btn-primary">お気に入り解除</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>