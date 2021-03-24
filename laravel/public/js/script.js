$(function() {
    accountDestroy();
    confirmAlert('#regist', '登録');    
    if (location.pathname.match(/admin\/enquete\/edit/)){
        inactivateInputTag();
    }
    noActive();

});


$(document).ready(function() {
    destroyGroupQuestion();
    destroyQuestion();
    warnRemovePrePage();
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


// 個別の質問を削除
function destroyQuestion() {
    var target = $('.del-question');
    var i;
    for (i = 0; i < target.length; i++) {
        target.eq(i).on('click', function(e) {
            e.preventDefault();
            if (confirm('削除します。宜しいですか？')) {
                console.log(this.dataset.id);
                $('#form_' + this.dataset.id).submit();
            }
        });
    }
}


// 個別の質問を削除する場合、前のページから削除してもらうよう促す
function warnRemovePrePage() {
    var len = $('.del-question').get().length;
    if (len == 1) {
        $('.del-question').remove();
        $('.btn-group').append('<p>一つ前のページから<br>削除してください</p>')
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


// アンケート回答画面にて質問データの登録がない場合送信ボタンを消す
function sendBtnRemove() {
    var path = location.pathname;
    if (path == '/user/enquete/index') {
        if ($('.not_yet').length) {
            $('.send').remove();
        }
    }
}


// テキストボックス非活性
 function noActive(){
     var path = location.pathname;
     if (path.indexOf('/admin/enquete/editQuestion') != -1) {
        $('.hoge').on('click', function(){
            // 選択されるラジオボタンのvalue
            var radilval = $(this).val();

            // テキストボックスの場合は非活性
            if (radilval == '1')
            {
               for(var i=1; i<=5; i++){
                   var name = 'item_content' + i;
                   $('input[name=' + name + ']').prop('disabled', true);
               }
            }
            else
            {
               for(var i=1; i<=5; i++){
                   var name = 'item_content' + i;
                   $('input[name=' + name + ']').prop('disabled', false);
               }
            }
        });
     }
 }

