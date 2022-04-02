$(document).ready(function () {
  const heightHeader = $(".header").height();
  let isShowMenu = true;

  $(".header .menu-lg").css("top", `${heightHeader}px`);

  $(".header .menu-lg .btn-close-menu").click(function () {
    isShowMenu = false;
    $(".header .menu-lg").css("animation-name", "close");
  });

  $(".header .btn-show-menu").click(() => {
    isShowMenu = !isShowMenu;
    $(".header .menu-lg").css(
      "animation-name",
      `${isShowMenu ? "open" : "close"}`
    );
  });

  $(".menu-lg-item a").click(function () {
    const span = $(this).children();
    const className = span.attr("class");
    const id = this.getAttribute("data-bs-toggle");
    if (className === "iconUp") {
      span.attr("class", "iconDown")
      $(id).css("animation-name", "showSubmenu");
    } else if (className === "iconDown") {
      span.attr("class", "iconUp")
      $(id).css("animation-name", "closeSubmenu");
    }
  });
});
