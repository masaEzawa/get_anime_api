<div class="modal fade" id="modal1" tabindex="-1"
      role="dialog" aria-labelledby="anime-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="anime-title">アニメのタイトル</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="myform" action="{{ url('mylist/create') }}" method="get">
            <input type="hidden" name="anime_id">
            <input type="hidden" name="title">
            <input type="hidden" name="public_url">
            <input type="hidden" name="year">
            <input type="hidden" name="cours_id">
        </form>
        公式サイトURL：
        <a id="anime-url" target="_blank"></a>
        <br>
        <p id="modal-question">お気に入りに追加しますか？</p>
      </div>
      <div class="modal-footer">
        <a id="add-btn" href="javascript:void(0);" onclick="modal_submit();" class="btn btn-primary">追加</a>
        <a id="no-add" href="javascript:void(0);" style="display: none;" class="btn btn-secondary">登録済み</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>