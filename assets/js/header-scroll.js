document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".header-inner");
  const logo = document.getElementById("lottie-logo");

  const themePath = window.location.origin + "/wp-content/themes/kcg-wp-theme";
  const animationPath = themePath + "/assets/anim/logo_kcg_unified_animation.json";
  const segmentStart = 186;
  const segmentEnd = 270;
  
  const animation = lottie.loadAnimation({
    container: logo,
    renderer: "svg",
    loop: false,
    autoplay: false,
    path: animationPath,
  });

  animation.addEventListener("DOMLoaded", () => {
    animation.goToAndStop(segmentStart, true);
  });

  animation.addEventListener("complete", () => {
    if (isAnimating) {
      isAnimating = false;
    }
  });

  // Make logo clickable to navigate to home page
  logo.addEventListener("click", () => {
    window.location.href = window.location.origin;
  });

  // Add cursor pointer style to indicate it's clickable
  logo.style.cursor = "pointer";

  let isScrolled = false;
  let isAnimating = false;
  let ticking = false;

  const playSegment = (forward) => {
    const segment = forward ? [segmentStart, segmentEnd] : [segmentEnd, segmentStart];
    isAnimating = true;
    animation.playSegments(segment, true);
  };

  const updateHeader = () => {
    const currentY = window.scrollY;
    const threshold = (20 * window.innerHeight) / 100;
    const shouldBeScrolled = currentY > threshold;
    const shouldToggle = isScrolled ? currentY < threshold : currentY > threshold;

    if (shouldToggle && !isAnimating) {
      if (!isScrolled && shouldBeScrolled) {
        header.classList.add("scrolled");
        playSegment(true);
        isScrolled = true;
      } else if (isScrolled && !shouldBeScrolled) {
        header.classList.remove("scrolled");
        playSegment(false);
        isScrolled = false;
      }
    }
  };

  const requestTick = () => {
    if (!ticking) {
      requestAnimationFrame(() => {
        updateHeader();
        ticking = false;
      });
      ticking = true;
    }
  };

  window.addEventListener("scroll", requestTick);
  
  // Check initial scroll position on page load
  updateHeader();
});
