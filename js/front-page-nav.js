// Navbar
$(function () {
  //caches a jQuery object containing the header element
  var navbar = $("#primaryNavbar");
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll > 0) {
      navbar
        .removeClass("py-4")
        .removeClass("bg-transparent")
        .removeClass("position-absolute")
        .addClass("bg-dark")
        .addClass("fixed-top");
    } else {
      navbar
        .removeClass("bg-dark")
        .removeClass("fixed-top")
        .addClass("py-4")
        .addClass("bg-transparent")
        .addClass("position-absolute");
    }
  });
});
