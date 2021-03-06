$(document).ready(function () {
    $('#pm-pm_material_id').change(function () {
        $('#pm-pm_unit_id').empty();
        var material_id = $('#pm-pm_material_id').val();
        $.ajax({
            url: "/product/admin/ajax/unit-list",
            type: "POST",
            data: {material_id: material_id},
            success: function (response) {
                $('#pm-pm_unit_id').append($('<option>', {
                    value: '',
                    text: 'Выберите учетную единицу'
                }));
                if (response.unit !== undefined) {
                    $.each(response.unit, function (key, value) {
                        $('#pm-pm_unit_id').append($('<option>', {
                            value: value.unit_id,
                            text: value.unit_title
                        }));
                    });
                }
            }
        });
    });
    $('#product_category').change(function(){
        $('#pm-pm_material_id').empty();
        var category_id = $('#product_category').val();
        $.ajax({
            url: "/product/admin/ajax/material-list",
            type: "POST",
            data: {category_id: category_id},
            success: function(response){
                $('#pm-pm_material_id').append($('<option>', {
                    value: '',
                    text: 'Выберите материал'
                }));
                if (response.material !== undefined) {
                    $.each(response.material, function (key, value) {
                        $('#pm-pm_material_id').append($('<option>', {
                            value: value.material_id,
                            text: value.material_title
                        }));
                    });
                }
            }
        });
    });
});