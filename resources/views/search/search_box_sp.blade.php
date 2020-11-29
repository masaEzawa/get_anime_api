<div class="row">
    <div class="col-xs-12 search-box">
        {{ Form::model( $search, ['method' => 'GET', 'url' => url('search')] ) }}
            <table class="table">
                <tr>
                    <th class="color-white list_th">年</th>
                    <td>
                        <?php
                        // 年の配列
                        $yearList = ["" => "----"] + \AnimeConst::getYearList();
                        ?>
                        {{ Form::select( 'year', $yearList, null, ['class' => 'form-control'] ) }}
                    </td>
                </tr>
                <tr>
                    <th class="color-white list_th">クール</th>
                    <td>
                        <?php
                        // クールのリスト
                        $courList = ["" => "----"] + \AnimeConst::COUR_LIST;
                        ?>
                        {{ Form::select( 'cours_id', $courList, null, ['class' => 'form-control'] ) }}
                    </td>
                </tr>
                <tr>
                    <th class="color-white list_th">タイトル</th>
                    <td>
                        {{ Form::text( 'title', null, ['class' => "form-control"] ) }}
                    </td>
                </tr>
            </table>

            <div class="col-xs-4 offset-4">
                <button type="submit" class="login_btn btn btn-block">検索</button>
            </div>
        {{ Form::close() }}
    </div>
</div>