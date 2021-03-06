var avalon = avalon || {};

avalon.setUpNav = function () {
  $(".nav li.cat-item:has(ul.children)").addClass("right-arrow");
};

avalon.setUpCategoryFilter = function () {
  $(".categories ul ul ul")
    .parent(".cat-item")
    .append(
      '<span class="toggle-cat"><i class="fa fa-caret-down" aria-hidden="true"></i>'
    );

  $(".toggle-cat").on("click", function (e) {
    e.preventDefault();
    $(this).children().toggleClass("fa-caret-down fa-caret-up");
    $(this).prev().slideToggle("slow");
  });
};

avalon.openNav = function () {
  document.getElementById("mySidenav").style.width = "100%";
};

avalon.closeNav = function () {
  document.getElementById("mySidenav").style.width = "0";
};

avalon.setSlideshow = function () {
  $(".slideshow-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: ".slideshow-nav",
    adaptiveHeight: true,
  });

  $(".slideshow-nav").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: ".slideshow-slider",
    arrows: false,
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    vertical: false,
    adaptiveHeight: true,
  });

  setTimeout(function () {
    $(".slideshow-slider").slick("reinit");
    $(".slideshow-nav").slick("reinit");
  }, 500);
};

$(document).ready(function () {
  $("body").addClass("visible");

  avalon.setUpNav();
  avalon.setUpCategoryFilter();
  avalon.setSlideshow();

  lightbox.option({
    resizeDuration: 200,
    wrapAround: true,
  });
});
