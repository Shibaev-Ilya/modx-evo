$(() => {
  $(document).on("click", ".js-anchor", function (event) {
    event.preventDefault();
    const $this = $(this);
    const height = $this.attr("data-height");
    const href = ($this.attr("href")).match(/\#.+/)[0];
    if ($this.hasClass("navigation__nav-link")) {
      $(".navigation__nav-link").removeClass("active");
      $this.addClass("active");
    }

    $("html, body")
      .stop(true, true)
      .delay(200)
      .animate(
        {
          scrollTop: $(href).offset().top - Number(height),
        },
        500
      );
  });
});  