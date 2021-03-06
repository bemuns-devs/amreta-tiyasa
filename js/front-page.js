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

// ParticleJS
$(document).ready(function () {
  particlesJS("particles-js", {
    particles: {
      number: {
        value: 256,
        density: {
          enable: true,
          value_area: 800,
        },
      },
      color: {
        value: "#1cc2ff",
      },
      shape: {
        type: "circle",
        stroke: {
          width: 0,
          color: "#000000",
        },
        polygon: {
          nb_sides: 5,
        },
        image: {
          src: "img/github.svg",
          width: 100,
          height: 100,
        },
      },
      opacity: {
        value: 1,
        random: true,
        anim: {
          enable: true,
          speed: 1,
          opacity_min: 0,
          sync: false,
        },
      },
      size: {
        value: 3,
        random: true,
        anim: {
          enable: false,
          speed: 4,
          size_min: 0.3,
          sync: false,
        },
      },
      line_linked: {
        enable: false,
        distance: 150,
        color: "#ffffff",
        opacity: 0.4,
        width: 1,
      },
      move: {
        enable: true,
        speed: 1,
        direction: "top",
        random: true,
        straight: false,
        out_mode: "out",
        bounce: false,
        attract: {
          enable: false,
          rotateX: 600,
          rotateY: 600,
        },
      },
    },
    interactivity: {
      detect_on: "canvas",
      events: {
        onhover: {
          enable: false,
          mode: "bubble",
        },
        onclick: {
          enable: false,
          mode: "repulse",
        },
        resize: true,
      },
      modes: {
        grab: {
          distance: 400,
          line_linked: {
            opacity: 1,
          },
        },
        bubble: {
          distance: 250,
          size: 0,
          duration: 2,
          opacity: 0,
          speed: 3,
        },
        repulse: {
          distance: 400,
          duration: 0.4,
        },
        push: {
          particles_nb: 4,
        },
        remove: {
          particles_nb: 2,
        },
      },
    },
    retina_detect: true,
  });
});

var $grid = $(".platform-wrap").imagesLoaded(function () {
  // init Masonry after all images have loaded
  $grid.masonry({
    fitWidth: true,
    gutter: 24,
    horizontalOrder: true,
  });
});
