$(document).ready(function () {
    $('#product_category').change(function(){
        $('#mr-mr_material_id').empty();
        var category_id = $('#product_category').val();
        $.ajax({
            url: "/product/admin/ajax/material-list",
            type: "POST",
            data: {category_id: category_id},
            success: function(response){
                $('#mr-mr_material_id').append($('<option>', {
                    value: '',
                    text: 'Выберите материал'
                }));
                if (response.material !== undefined) {
                    $.each(response.material, function (key, value) {
                        $('#mr-mr_material_id').append($('<option>', {
                            value: value.material_id,
                            text: value.material_title
                        }));
                    });
                }
            }
        });
    });
});