/**
 * Created by MyPC on 14/04/2017.
 */
$(document).ready(function () {

//    On click signup, hide login and show registration form
    $('#signup').click(function () {
        $(".first").slideUp("slow", function () {
            $(".second").slideDown("slow");
        });
    });

//    On click signup, hide login and show registration form
    $('#signin').click(function () {
        $(".second").slideUp("slow", function () {
            $(".first").slideDown("slow");
        });
    });

});
