// Navbar
$(function () {
  //caches a jQuery object containing the header element
  var navbar = $("#primaryNavbar");
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll > 0) {
      navbar.removeClass("d-block").addClass("fixed-top");
    } else {
      navbar.removeClass("fixed-top").addClass("d-block");
    }
  });
});
