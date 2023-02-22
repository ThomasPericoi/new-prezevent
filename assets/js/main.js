// Variables
class Page {
  constructor() {
    this.setVariables();
    $(window).on("resize", this.setVariables.bind(this));
  }

  setVariables() {
    $("html").css({
      "--viewport-height": $(window).outerHeight() + "px",
      "--header-height": $("header#header").outerHeight() + "px",
    });
  }
}

// On load
$(document).ready(function () {
  new Page();

  // General - Quote in the console
  console.log(
    "This theme was made by Thomas Pericoi - https://thomaspericoi.com/"
  );

  // General - Enable ASCII Printer on random
  printAsciiRandom();

  // General - Change tab name on blur
  if (!isMobile()) {
    originalTitle = $(document).find("title").text();

    $(window).focus(function () {
      document.title = originalTitle;
    });

    $(window).blur(function () {
      document.title = "Bye-bye !";

      setTimeout(function () {
        document.title = originalTitle;
      }, 350);
    });
  }

  // Block - F.A.Q.
  $('.faq-list li.question').on('click', function () {
    $(this).next()
      .slideToggle(350);
  });
});
