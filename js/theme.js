// Navbar Toggler
$(document).ready(function () {
  var changeIt = 0;
  $("#navbarToggler").click(function () {
    changeIt++;
    if (changeIt % 2 != 0) {
      $("#navbarToggler").removeClass("text-body");
      $("#navbarToggler").addClass("text-white");
      $("#navbarTogglerIcon").removeClass("bi-list");
      $("#navbarTogglerIcon").addClass("bi-x");
    } else {
      $("#navbarToggler").removeClass("text-white");
      $("#navbarToggler").addClass("text-body");
      $("#navbarTogglerIcon").removeClass("bi-x");
      $("#navbarTogglerIcon").addClass("bi-list");
    }
  });
});
