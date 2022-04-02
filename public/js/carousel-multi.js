$(document).ready(function () {
  const handleChangeNumberItem = (width) => {
    if (width > 1028) {
      $(".carousel-multi").attr("number", 4);
    } else if (width > 768 && width <= 1028) {
      $(".carousel-multi").attr("number", 2);
    } else {
      $(".carousel-multi").attr("number", 1);
    }
  };

  const width = window.innerWidth;

  window.onresize = () => {
    const width = window.innerWidth;
    handleChangeNumberItem(width);
  };

  handleChangeNumberItem(width);
  $(".carousel-multi").attr("index", 0);
  $(".carousel-multi .carousel-multi-control .btn-next").click(function () {
    const id = this.getAttribute("data-bs-target");
    handleNextCarousel(id);
  });
  const handleNextCarousel = (id) => {
    const numberItem = $(id).attr("number");
    const countItem = $(
      `${id} .carousel-multi-container .carousel-multi-item`
    ).length;
    const index =
      parseInt($(id).attr("index")) < countItem - numberItem
        ? parseInt($(id).attr("index")) + 1
        : 0;
    $(id).attr("index", index);
    $(`${id} .carousel-multi-item`).css(
      "transform",
      `translateX(-${index * 100}%)`
    );
  };
  $(".carousel-multi .carousel-multi-control .btn-prev").click(function () {
    const id = this.getAttribute("data-bs-target");
    const numberItem = $(id).attr("number");
    const countItem = $(
      `${id} .carousel-multi-container .carousel-multi-item`
    ).length;
    const index =
      parseInt($(id).attr("index")) > 0
        ? parseInt($(id).attr("index")) - 1
        : countItem - numberItem;
    $(id).attr("index", index);
    $(`${id} .carousel-multi-item`).css(
      "transform",
      `translateX(-${index * 100}%)`
    );
  });

  setInterval(() => {
    const carousel = $(".carousel-multi");
    for (let i = 0; i < carousel.length; i++) {
      const id = "#" + carousel[i].getAttribute("id");
      handleNextCarousel(id);
    }
  }, 5000);
});
