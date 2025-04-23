jQuery(document).ready(function ($) {
  let isMobileMenuOpen = false;
  let mobileMenuAnimation;
  let animation;

  $("#logo").on("click", function () {
    // Redirect to the homepage
    window.location.href = "<?php echo esc_url(home_url(" / ")); ?>";
  });

  // Load the Lottie animation for the mobile menu toggle
  function loadMobileMenuAnimation() {
    mobileMenuAnimation = lottie.loadAnimation({
      container: document.getElementById("mobile-menu-toggle"), // The container for the animation
      renderer: "svg",
      loop: false,
      autoplay: false,
      path: themeVars.themeDirectory + "/assets/images/mobile-toggle.json", // Path to the animation JSON
    });
  }

  // Toggle the mobile menu
  function toggleMobileMenu() {
    $("#mobile-menu").slideToggle(1500, "swing");
    isMobileMenuOpen = !isMobileMenuOpen;

    // Animate the Lottie animation between the hamburger and the cross
    if (isMobileMenuOpen) {
      mobileMenuAnimation.playSegments([0, 60], true); // Play to cross icon
    } else {
      mobileMenuAnimation.playSegments([60, 0], true); // Play back to hamburger icon
    }

    // Update navbar state when the mobile menu is toggled
    updateNavbarState();
  }

  // Load the mobile menu animation on document ready
  loadMobileMenuAnimation();

  // Click handler for the mobile menu toggle
  $("#mobile-menu-toggle").click(function () {
    toggleMobileMenu();
  });

  function loadAnimation(theme, container) {
    // Construct the animation path based on the current theme
    let animationPath =
      themeVars.themeDirectory + "/assets/images/logo_kcg.json";
    if (theme === "dark") {
      animationPath =
        themeVars.themeDirectory + "/assets/images/logo_kcg_light.json";
    }

    // Load the animation using Lottie
    const animationInstance = lottie.loadAnimation({
      container: container,
      renderer: "svg",
      loop: false,
      autoplay: false,
      path: animationPath,
    });

    animation = animationInstance;
  }

  const container = $("#logo")[0];
  loadAnimation("light", container);

  const isHomePage = $("body").hasClass("home");

  if (isHomePage) {
    $(".navbar").addClass("navbar-transparent");
  }

  let lastScrollTop = 0;
  const animationStartScroll = (8 * window.innerHeight) / 100;
  const logo = $("#logo");
  const animationDuration = 1.5;
  let animationPlayed = false;

  function updateNavbarState() {
    const scrollY = window.scrollY;
    const navbar = $(".navbar");

    if (isHomePage && (scrollY > animationStartScroll || isMobileMenuOpen)) {
      navbar.removeClass("navbar-transparent").addClass("navbar-solid");
    } else if (
      isHomePage &&
      scrollY <= animationStartScroll &&
      !isMobileMenuOpen
    ) {
      navbar.removeClass("navbar-solid").addClass("navbar-transparent");
    }
  }

  function handleScroll() {
    const scrollY = window.scrollY;
    lastScrollTop = scrollY;

    updateNavbarState();

    if (scrollY > animationStartScroll && !animationPlayed) {
      animationPlayed = true;
      animation.playSegments([0, animation.totalFrames], true);
      gsap.to(logo, {
        height: "6vh",
        duration: animationDuration,
        ease: "power1.inOut",
      });
    } else if (scrollY <= animationStartScroll && animationPlayed) {
      animationPlayed = false;
      animation.playSegments([animation.totalFrames, 0], true);
      gsap.to(logo, {
        height: "15vh",
        duration: animationDuration,
        ease: "power1.inOut",
      });
    }
  }

  $(window).on("scroll", handleScroll);
  handleScroll();
});
