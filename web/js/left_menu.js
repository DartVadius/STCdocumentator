$(document).ready(function () {
    $("#menu_left_custom li ul").hide();
    $("#menu_left_custom li a").click(function () {
        $("#menu_left_custom ul:visible").slideUp("fast");
        if (($(this).next().is("ul")) && (!$(this).next().is(":visible"))) {
            $(this).next().slideDown("fast");
            $(this).next().attr('style', 'position: relative; display: block;');
//            $(this).last('ul li').attr('style', 'margin: 25px, 25px');
        }
    });

});