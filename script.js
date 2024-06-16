jQuery(document).ready(function ($) {
  $(document).ready(function () {
    $("#mobile-menu-toggle").click(function () {
      $("#mobile-menu").slideToggle();
      if (!$(".navbar").hasClass("navbar-solid")) {
        $(".navbar").addClass("navbar-solid");
      } else {
        $(".navbar").removeClass("navbar-solid");
      }
    });
  });

  let animation; // Variables to hold the Lottie animation instances

  // Function to load Lottie animation based on theme
  function loadAnimation(theme, container) {
    const animationPath =
      theme === "light"
        ? "wp-content/themes/kcg/assets/images/logo_kcg.json"
        : "wp-content/themes/kcg/assets/images/logo_kcg_light.json";

    // Load new animation
    const animationInstance = lottie.loadAnimation({
      container: container,
      renderer: "svg",
      loop: false,
      autoplay: false,
      path: animationPath,
    });
    animation = animationInstance;
  }

  // Function to set theme and load appropriate animation
  function setTheme(theme) {
    const icon = $("#theme-icon"); // Updated to use the new icon ID
    const container = $("#logo")[0]; // Select the desktop logo element

    if (theme === "dark") {
      $("body").addClass("dark-mode");
      icon.removeClass("bi-sun").addClass("bi-moon");
      loadAnimation("dark", container); // Load dark mode animation for desktop
    } else {
      $("body").removeClass("dark-mode");
      icon.removeClass("bi-moon").addClass("bi-sun");
      loadAnimation("light", container); // Load light mode animation for desktop
    }

    localStorage.setItem("theme", theme);
  }

  // Function to toggle the theme
  function toggleTheme() {
    const currentTheme = $("body").hasClass("dark-mode") ? "dark" : "light";
    const newTheme = currentTheme === "dark" ? "light" : "dark";
    setTheme(newTheme);
  }

  // Add click handler for the toggle dark mode button
  $(".toggle-dark-mode").on("click", function () {
    toggleTheme();
  });

  // Load saved theme and animation
  const savedTheme = localStorage.getItem("theme") || "light";
  setTheme(savedTheme);

  // Scroll behavior for navbar
  let lastScrollTop = 0;
  const animationStartScroll = 50;
  const logo = $("#logo");
  const animationDuration = 1.5; // Duration in seconds
  let animationPlayed = false;

  function handleScroll() {
    const scrollY = window.scrollY;
    const navbar = $(".navbar");
    const scrollDirection = scrollY > lastScrollTop ? "down" : "up";
    lastScrollTop = scrollY;

    if (scrollY > animationStartScroll) {
      if (!navbar.hasClass("navbar-solid")) {
        navbar.addClass("navbar-solid");
      }
      // $(".mobile-menu").css("top", "40vh");

      if (!animationPlayed) {
        animationPlayed = true;
        animation.playSegments([0, animation.totalFrames], true);
        gsap.to(logo, {
          height: "6vh",
          duration: animationDuration,
          ease: "power1.inOut",
        });
      }
    } else {
      if (navbar.hasClass("navbar-solid")) {
        navbar.removeClass("navbar-solid");
      }

      if (animationPlayed) {
        animationPlayed = false;
        animation.playSegments([animation.totalFrames, 0], true);
        gsap.to(logo, {
          height: "15vh",
          duration: animationDuration,
          ease: "power1.inOut",
        });
      }
    }
  }

  $(window).on("scroll", handleScroll);
  handleScroll();
});
