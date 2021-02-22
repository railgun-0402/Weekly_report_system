$(function() {
    accountDestroy();
    inactivateInputTag();
    confirmAlert('#regist', '登録');

});


$(window).on('load', function() {
    reloadInactiveInputTag();

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

// 確認アラート
function confirmAlert(elem, word) {
    $(elem).on('click', function(e) {
        if (!confirm(word + 'します。宜しいですか？')) {
            e.preventDefault();
            return false;
        } else {
            $(this).submit();
        }
    });
}


// inputタグ無効/有効
function inactivateInputTag() {
    $('input[name^=form_types_code]').on('click', function() {
        var id = $(this).attr('id'); // idの値 qxy
        var id_last = id.slice(-1); // idの値末尾 y
        var id_second_last = id.slice(-2); // idの値末尾から2つ xy
        var id_row = id_second_last.slice(0, 1); // idの値末尾から2つ xy の先頭1つ目 x

        if (id_last == '1') {
            console.log("OK");
            $('.not_radio' + id_row).attr('readonly', true);
        } else {
            $('.not_radio' + id_row).attr('readonly', false);
        }
    });
}


// reload時のinputタグ無効/有効
function reloadInactiveInputTag() {
    var inputs = $('input[name^=form_types_code]').get();
    $.each(inputs, function(index, elem) {
        if ($(elem).attr('checked') == 'checked') {
            var chk = $(elem).attr('id').slice(-1); // idの値末尾 y
            var chk_second_last = chk.slice(-2); // idの値末尾から2つ xy
            var chk_row = chk_second_last.slice(0, 1); // idの値末尾から2つ xy の先頭1つ目 x
            if (chk_row == '1') {
                $('.not_radio' + chk_row).attr('readonly', true);
            } else {
                $('.not_radio' + chk_row).attr('readonly', false);
            }
        }
    });
}

// clearInputContent();
// function clearInputContent() {

//     $('#clear_input_content').on('click', function(e) {
//         e.preventDefault();
//         console.log("OK");

//         var inputs = $('form').find('input').not('input[type=submit]', 'input[type=radio]').get();
//         $.each(inputs, function(index, elem){
//             $(elem).val('').attr('checked', false);
//         });

//     });

// }


// DOM描画後、質問の総数を取得しhiddenで渡すinputタグを挿入
function getQuestionNumber() {
    var len = $('td[scope=row]').length;
    var get_question_num = '<input type="hidden" name="number_of_questions" value="' + len + '">';
    $('form').prepend(get_question_num);
}
