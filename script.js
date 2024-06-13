jQuery(document).ready(function ($) {
  // Toggle navbar icon open class
  $(".navbar-toggler").click(function () {
    if ($(".navbar-toggler").attr("aria-expanded") === "false") {
      $(".navbar-toggler-icon").addClass("navbar-toggler-icon-open");
      $(".navbar").addClass("navbar-solid");
    } else {
      $(".navbar-toggler-icon").removeClass("navbar-toggler-icon-open");
    }
  });

  let animationDesktop, animationMobile; // Variables to hold the Lottie animation instances

  // Function to load Lottie animation based on theme
  function loadAnimation(theme, container, isMobile = false) {
    const animationPath =
      theme === "light"
        ? "wp-content/themes/kcg/assets/images/logo_kcg.json"
        : "wp-content/themes/kcg/assets/images/logo_kcg_light.json";

    // Unload current animation if it exists
    if (isMobile && animationMobile) {
      animationMobile.destroy();
    } else if (!isMobile && animationDesktop) {
      animationDesktop.destroy();
    }

    // Load new animation
    const animationInstance = lottie.loadAnimation({
      container: container,
      renderer: "svg",
      loop: false,
      autoplay: false,
      path: animationPath,
    });

    if (isMobile) {
      animationMobile = animationInstance;
    } else {
      animationDesktop = animationInstance;
    }
  }

  // Function to set theme and load appropriate animation
  function setTheme(theme) {
    const icon = $("#dark-mode-icon, #dark-mode-icon-mobile");
    const containerDesktop = $("#logo-desktop")[0]; // Select the desktop logo element
    const containerMobile = $("#logo-mobile")[0]; // Select the mobile logo element

    let effectiveTheme = theme;

    if (theme === "auto") {
      const prefersDarkScheme = window.matchMedia(
        "(prefers-color-scheme: dark)"
      ).matches;
      effectiveTheme = prefersDarkScheme ? "dark" : "light";
    }

    if (effectiveTheme === "dark") {
      $("body").addClass("dark-mode");
      icon.removeClass("bi-sun").addClass("bi-moon");
      loadAnimation("dark", containerDesktop); // Load dark mode animation for desktop
      loadAnimation("dark", containerMobile, true); // Load dark mode animation for mobile
    } else {
      $("body").removeClass("dark-mode");
      icon.removeClass("bi-moon").addClass("bi-sun");
      loadAnimation("light", containerDesktop); // Load light mode animation for desktop
      loadAnimation("light", containerMobile, true); // Load light mode animation for mobile
    }

    if (theme !== "auto") {
      localStorage.setItem("theme", theme);
    } else {
      localStorage.removeItem("theme");
    }
  }

  // Dropdown menu items click handlers
  $(".auto-mode-button").on("click", function () {
    setTheme("auto");
  });

  $(".light-mode-button").on("click", function () {
    setTheme("light");
  });

  $(".dark-mode-button").on("click", function () {
    setTheme("dark");
  });

  // Load saved theme and animation
  const savedTheme = localStorage.getItem("theme") || "auto";
  setTheme(savedTheme);

  // Handle system preference change
  const mediaQuery = window.matchMedia("(prefers-color-scheme: dark)");
  mediaQuery.addListener((e) => {
    if (localStorage.getItem("theme") === "auto") {
      setTheme("auto");
    }
  });

  // Ensure the theme updates on page load if the system preference changes while the page is open
  if (savedTheme === "auto") {
    setTheme("auto");
  }

  // Scroll behavior for navbar
  let lastScrollTop = 0;
  const animationStartScroll = 50;
  const logoDesktop = $("#logo-desktop");
  const logoMobile = $("#logo-mobile");
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

      if (!animationPlayed) {
        animationPlayed = true;
        animationDesktop.playSegments([0, animationDesktop.totalFrames], true);
        animationMobile.playSegments([0, animationMobile.totalFrames], true);
        gsap.to(logoDesktop, {
          height: "8vh",
          duration: animationDuration,
          ease: "none",
        });
        gsap.to(logoMobile, {
          height: "8vh",
          duration: animationDuration,
          ease: "none",
        });
      }
    } else {
      if (navbar.hasClass("navbar-solid")) {
        navbar.removeClass("navbar-solid");
      }

      if (animationPlayed) {
        animationPlayed = false;
        animationDesktop.playSegments([animationDesktop.totalFrames, 0], true);
        animationMobile.playSegments([animationMobile.totalFrames, 0], true);
        gsap.to(logoDesktop, {
          height: "18vh",
          duration: animationDuration,
          ease: "none",
        });
        gsap.to(logoMobile, {
          height: "18vh",
          duration: animationDuration,
          ease: "none",
        });
      }
    }
  }

  $(window).on("scroll", handleScroll);
  handleScroll();
});
