$(document).ready(function () {
    $("table tr").editable({
        keyboard: true,
        dblclick: true,
        button: true,
        buttonSelector: ".edit",
        dropdowns: {},
        maintainWidth: true,
        edit: function (values) {},
        save: function (values) {
            var id = $(this).data('key');
            var table = $(this).parent().parent().attr('id');
            console.log(values);
            console.log(id);
            console.log(table);
            var data = {
                id: id,
                table: table,
                values: values
            };
            $.ajax({
                url: "/product/admin/ajax/quick-save",
                type: "POST",
                data: data,
                success: function (response) {
                    console.log(response.res);
                }
            });
        },
        cancel: function (values) {}
    });
});