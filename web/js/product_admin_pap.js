$(document).ready(function () {
    $('#pack_category').change(function () {
        $('#pap-pap_pack_id').empty();
        var category_id = $('#pack_category').val();
        $.ajax({
            url: "/product/admin/ajax/pack-list",
            type: "POST",
            data: {category_id: category_id},
            success: function (response) {
                $('#pap-pap_pack_id').append($('<option>', {
                    value: '',
                    text: 'Выберите упаковку'
                }));
                if (response.pack !== undefined) {
                    $.each(response.pack, function (key, value) {
                        $('#pap-pap_pack_id').append($('<option>', {
                            value: value.pack_id,
                            text: value.pack_title
                        }));
                    });
                }
            }
        });
    });
});