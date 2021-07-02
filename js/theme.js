// Navbar Toggler
$(document).ready(function () {
  var changeIt = 0;
  $("#navbarToggler").click(function () {
    changeIt++;
    if (changeIt % 2 != 0) {
      $("#navbarToggler").removeClass("text-secondary");
      $("#navbarToggler").addClass("text-white");
      $("#navbarTogglerIcon").removeClass("fa-bars");
      $("#navbarTogglerIcon").addClass("fa-times");
    } else {
      $("#navbarToggler").removeClass("text-white");
      $("#navbarToggler").addClass("text-secondary");
      $("#navbarTogglerIcon").removeClass("fa-times");
      $("#navbarTogglerIcon").addClass("fa-bars");
    }
  });
});
