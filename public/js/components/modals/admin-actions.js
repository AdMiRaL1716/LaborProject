$(document).on('click', '.open-modal', function() {
    var idItem, form, close;
    idItem = $(this).attr('data-id');
    close = $('.modal_close');
    form = $('#action_form');
    form.attr('action', function (i, v) {
        return v + idItem;
    });
    close.click( function(){
        location.reload();
    });
});
