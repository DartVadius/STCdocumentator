$(document).ready(function () {
    $("#w0 li ul").hide();
    $("#w0 li a").click(function () {
        $("#w0 ul:visible").slideUp("normal");
        if (($(this).next().is("ul")) && (!$(this).next().is(":visible"))) {
            $(this).next().slideDown("normal");
        }
    });

});