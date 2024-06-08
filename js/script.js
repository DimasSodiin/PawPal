document.addEventListener("DOMContentLoaded", function () {
  var carouselElement = document.getElementById("carouselExampleCaptions");

  if (carouselElement) {
    var carousel = new bootstrap.Carousel(carouselElement, {
      interval: 5000,
      ride: "carousel",
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const navbar = document.getElementById("mainNavbar");

  window.addEventListener("scroll", function () {
    if (window.scrollY > 650) {
      // Atur nilai sesuai kebutuhan
      navbar.classList.add("navbar-scrolled");
    }
  });
});
