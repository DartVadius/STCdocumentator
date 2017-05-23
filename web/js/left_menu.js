$(document).ready(function () {
    $("#w0 li ul").hide();
    $("#w0 li a").click(function () {
        $("#w0 ul:visible").slideUp("fast");
        if (($(this).next().is("ul")) && (!$(this).next().is(":visible"))) {
            $(this).next().slideDown("fast");
            $(this).next().attr('style', 'position: relative; display: block;');
//            $(this).last('ul li').attr('style', 'margin: 25px, 25px');
        }
    });

});