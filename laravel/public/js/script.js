$(function() {

    // アカウント削除
    accountDestroy();

    // inputタグ無効化
    inactivateInputTag();

});


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

function inactivateInputTag() {
    var target_array = $('.not_radio');
    $('#q1').on('click', function() {
        $.each(target_array, function(index, elem) {
            $(elem).attr('readonly', true);
        });

    });
    $('#q2, #q3, #q4').on('click', function() {
        $.each(target_array, function(index, elem) {
            $(elem).attr('readonly', false);
        });
    });
}
