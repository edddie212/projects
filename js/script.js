$('#msg-box').delay(2000).slideUp();
$('.delete-post').on('click', function () {
    if (confirm('Are your sure?')) {

    } else {
        return false;
    }

});
$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('.backTop').fadeIn();
        } else {
            $('.backTop').fadeOut();
        }
    });
    $('.backTop').click(function () {
        $(this).scrollTop(1000);
    });
});





if ($(window).height() > 769) {
    var mywindow = $(window);
    var mypos = mywindow.scrollTop();
    var up = false;
    var newscroll;
    mywindow.scroll(function () {
        newscroll = mywindow.scrollTop();
        if (newscroll > mypos && !up) {
            $('.header-top').stop().fadeOut(730);
            up = !up;
            console.log(up);
        } else if (newscroll < mypos && up) {
            $('.header-top').stop().fadeIn(300);
            up = !up;
        }
        mypos = newscroll;
    });
}