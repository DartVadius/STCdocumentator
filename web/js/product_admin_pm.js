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
});