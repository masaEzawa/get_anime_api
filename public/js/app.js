$(function() {
    // 日付のカレンダー入力UIの設定
    $( '.datepicker' ).datepicker({
        dateFormat:'yy-mm-dd', // 日付のフォーマット
        autoclose: true, // 入力後自動で閉じる。
        language: 'ja' // 日本語
    });
    
    // 星評価のデフォルト表示を生成（☆）
    $('.range-group').each(function() {
        // 5回繰り返す
        for (var i = 0; i < 5; i ++) {
            $(this).append('<a>');
        }
    });

    // inputに星評価が入っている場合、反映する
    var star_review = $('.input-range').val();
    if( star_review !== "" && star_review !== "undefined" ){
        // 星評価の選択表示を解除する
        $('.range-group > a').siblings().removeClass('on');
        // 星評価の入っている数分繰り返す
        for (var i = 0; i < star_review; i++) {
            // 星評価を表示に反映する
            $('.range-group > a').parent().find('a').eq(i).addClass('on'); 
        }
    }

    // 星評価がクリックされたとき、星表示を変更する
    $('.range-group>a').on('click', function() {
        // 星評価のクリックされた数値（index）を取得する
        var index = $(this).index();
        // 星評価の選択表示を解除する
        $(this).siblings().removeClass('on');
        // 星評価の入っている数分繰り返す
        for (var i = 0; i < index; i++) {
            // 星評価を表示に反映する
            $(this).parent().find('a').eq(i).addClass('on'); 
        }
        // 星評価の数値をinputに反映する
        $(this).parent().find('.input-range').attr('value', index);
    });
});