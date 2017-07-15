$('#page-size').change(function () {
    var page = $('#page-size').val();
    $.ajax({
        url: '/product/admin/ajax/set-page',
        type: 'POST',
        data: {page: page},
        success: function () {
            location.reload();
        }
    });
});