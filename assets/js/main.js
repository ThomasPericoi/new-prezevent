// On load
document.addEventListener("DOMContentLoaded", function () {
  // General - Set/Update variables
  function updateVariables() {
    document.querySelector(':root').style.setProperty('--viewport-height', window.innerHeight + 'px');
    document.querySelector(':root').style.setProperty('--header-height', document.querySelector("#header").offsetHeight + 'px');
  }
  window.addEventListener('resize', function () {
    updateVariables();
  });
  updateVariables();

  // General - Insert quote in the console
  console.log("Ce thème a été fait main par Thomas Pericoi - https://thomaspericoi.com/");

  // General - Enable ASCII Printer on random
  printRandomAscii();

  // General - Change tab name on blur
  if (!isMobile()) {
    originalTitle = document.title;

    window.addEventListener("focus", () => {
      document.title = originalTitle;
    });

    window.addEventListener("blur", () => {
      document.title = "Bye-bye !";

      setTimeout(function () {
        document.title = originalTitle;
      }, 350);
    });
  }

  // General - Elements is in view
  function toggleClassOnScroll(trigger, target) {
    if (trigger && target) {
      var elementTop = trigger.getBoundingClientRect().top;
      if (elementTop > window.innerHeight * 0.15 && elementTop < window.innerHeight * 0.85) {
        target.classList.add("js-inView");
      } else {
        target.classList.remove("js-inView");
      }
    }
  }
  function markAsViewed(trigger, target) {
    if (trigger && target) {
      if (trigger && target) {
        var elementTop = trigger.getBoundingClientRect().top;
        if (elementTop > window.innerHeight * 0.15 && elementTop < window.innerHeight * 0.85) {
          target.classList.add("js-viewed");
        }
      }
    }
  }
  window.addEventListener("scroll", () => {
    document.querySelectorAll(".js-toBeTriggered").forEach(function (item, index) {
      toggleClassOnScroll(item, item);
    });
    document.querySelectorAll("main section").forEach(function (item, index) {
      markAsViewed(item, item);
    });
  });
  document.querySelectorAll(".js-toBeTriggered").forEach(function (item, index) {
    toggleClassOnScroll(item, item);
  });
  document.querySelectorAll("main section").forEach(function (item, index) {
    markAsViewed(item, item);
  });

  // Header - Menu
  document.querySelectorAll("header .menu-header>li>a").forEach(function (item) {
    item.tabIndex = 0;
  });

  // Block - F.A.Q.
  $('.faq-list li.question').on('click', function () {
    $(this).next().slideToggle(350);
  });
  $('.faq-list li.question').on('keypress', function (e) {
    if ((e.keyCode || e.which) == 13) {
      $(this).next().slideToggle(350);
    }
  });

  // Block - Slider
  var blockSliderSwiper = new Swiper(".slider-block .swiper", {
    autoHeight: true,
    slidesPerView: 1,
    spaceBetween: 100,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
  });

  // Block - Tabs
  function show_content(index) {
    $('.tabs .content.visible').removeClass('visible');
    $('.tabs .content:nth-of-type(' + (index + 1) + ')').addClass('visible');
    $('.tabs nav a.selected').removeClass('selected');
    $('.tabs nav a:nth-of-type(' + (index + 1) + ')').addClass('selected');
  }
  $('.tabs nav a').on('click', function () {
    show_content($(this).index());
  });
  $('.tabs nav a').on('keypress', function (e) {
    if ((e.keyCode || e.which) == 13) {
      show_content($(this).index());
    }
  });
  show_content(0);
}); 