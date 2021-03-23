$(function() {
    accountDestroy();
    inactivateInputTag();
    confirmAlert('#regist', '登録');
    hideElement();
    buttonAction();
    // questionDelete();

});


$(document).ready(function() {
    notEnteredQARemove();

});


$(window).on('load', function() {
    reloadInactiveInputTag();
    sendBtnRemove();


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



// 質問の集合体の削除
destroyGroupQuestion();

function destroyGroupQuestion() {
    var target = $('.del-question-group');
    var i;
    for (i = 0; i < target.length; i++) {
        target.eq(i).on('click', function(e) {
            e.preventDefault();
            if (confirm('削除します。宜しいですか？')) {
                $('#form_' + this.dataset.id).submit();
            }
        });
    }
}


// // 質問削除
// function questionDelete(){
//     var target = $('.deldel');
//     var i;
//     for (i = 0;i < target.length; i++){
//         target.eq(i).on('click', function(e){
//             e.preventDefault();
//             var delConfirm = confirm('この質問を削除しますが、よろしいですか？');
//             if (delConfirm == true){
//                 $(".form_" + this.dataset.id).submit();
//             }
//         });
//     }
// }

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
            if ($(elem).attr('id') == 'q11') {
                $('.not_radio1').attr('readonly', true);
            } else if ($(elem).attr('id') == 'q21') {
                $('.not_radio2').attr('readonly', true);
            } else if ($(elem).attr('id') == 'q31') {
                $('.not_radio3').attr('readonly', true);
            } else if ($(elem).attr('id') == 'q41') {
                $('.not_radio4').attr('readonly', true);
            } else if ($(elem).attr('id') == 'q51') {
                $('.not_radio5').attr('readonly', true);
            } else if ($(elem).attr('id') == 'q61') {
                $('.not_radio6').attr('readonly', true);
            } else if ($(elem).attr('id') == 'q71') {
                $('.not_radio7').attr('readonly', true);
            }
        }
    });
}

// ページ読み込み時に質問4～7が空なら要素を隠す
function hideElement() {
    var tr_tag_array = $('tbody').children('tr').get();
    $.each(tr_tag_array, function (index, elem) {
        if (3<=index || index <= 6) {
            if ($(elem).find('textarea').val().length == 0) {
                // $(elem).hide();
            }
        }
    });
}

// +ボタンクリック時に要素を表示し限界まで表示したらボタンを隠す
function buttonAction() {
    $('#plus').on('click', function () {
        var tr_tag_array = $('tbody').children('tr').get();
        $.each(tr_tag_array, function (i, e) {
            if ($(e).attr('style') != 'display: none;' && i == 5) {
                // $('#plus').hide();
            }
        });
        $.each(tr_tag_array, function (index, elem) {
            if (0<=index || index <= 6) {

                // if ($(elem).attr('style') == 'display: none;') {
                //     console.log("OK");
                $(elem).show();
                return false;
            }

        });
    });
    // 最後のテキストエリアに値があれば＋ボタンを隠す
    var t_array = $('textarea[name^=content]').get();
    if (t_array[t_array.length - 1].textContent != '') {
        // $('#plus').hide();
    }
}

// アンケート回答画面にて質問データの登録がない場合送信ボタンを消す
function sendBtnRemove() {
    var path = location.pathname;
    if (path == '/user/enquete/index') {
        if ($('.not_yet').length) {
            $('.send').remove();
        }
    }
}

// adminの回答内容閲覧でDBに登録のない質問/回答は非表示にする
function notEnteredQARemove() {
    var path = location.pathname;
    if (path.match(/admin\/answered\/show/)) {
        var q_array = $('.q_info').get();
        $.each(q_array, function(index, elem) {
            var text = $(elem).text();
            if (text.length == 0) {
                $(elem).closest('dl').remove();
            }
        });
    }
}


