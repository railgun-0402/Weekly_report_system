$(function () {
    var cmds = $('.del');
    var i;
    for (i = 0; i < cmds.length; i++) {
        cmds.eq(i).on('click', function (e) {
            e.preventDefault();
            if (confirm('削除します。宜しいですか？')) {
                $('#form_' + this.dataset.id).submit();
            }
        });
    }
});
