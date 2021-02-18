$(function() {
    accountDestroy();
    inactivateInputTag();

});


$(window).on('load', function() {
    // getQuestionNumber();

});



 // アカウント削除
function accountDestroy() {
    var target = $('.del');
    var i;
    for (i = 0; i < target.length; i++) {
        target.eq(i).on('click', function (e) {
            e.preventDefault();
            if (confirm('削除します。宜しいですか？')) {
                $('#form_' + this.dataset.id).submit();
            }
        });
    }
}


// inputタグ無効/有効
function inactivateInputTag() {
    $('input[type=radio]').on('click', function() {
        var id = $(this).attr('id'); // idの値 qxy
        var id_last = $(this).attr('id').slice(-1); // idの値末尾 y
        var id_second_last = id.slice(-2); // idの値末尾から2つ xy
        var id_row = id_second_last.slice(0, 1); // idの値末尾から2つ xy の先頭1つ目 x
        if (id_last == '1') {
            $('.not_radio' + id_row).attr('readonly', true);
        } else {
            $('.not_radio' + id_row).attr('readonly', false);
        }
    });
}


// DOM描画後、質問の総数を取得しhiddenで渡すinputタグを挿入
function getQuestionNumber() {
    var len = $('td[scope=row]').length;
    var get_question_num = '<input type="hidden" name="number_of_questions" value="' + len + '">';
    $('form').prepend(get_question_num);
}
