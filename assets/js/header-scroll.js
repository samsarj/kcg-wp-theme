document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".header-inner");
  const logo = document.getElementById("lottie-logo");

  const themePath = window.location.origin + "/wp-content/themes/kcg-wp-theme";
  const animationPath = themePath + "/assets/anim/logo_kcg.json";
  
  const animation = lottie.loadAnimation({
    container: logo,
    renderer: "svg",
    loop: false,
    autoplay: false,
    path: animationPath,
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

  const updateHeader = () => {
    const currentY = window.scrollY;
    const threshold = (20 * window.innerHeight) / 100;
    const shouldBeScrolled = currentY > threshold;
    const shouldToggle = isScrolled ? currentY < threshold : currentY > threshold;

    if (shouldToggle && !isAnimating) {
      isAnimating = true;
      
      if (!isScrolled && shouldBeScrolled) {
        header.classList.add("scrolled");
        animation.setDirection(1);
        animation.play();
        isScrolled = true;
      } else if (isScrolled && !shouldBeScrolled) {
        header.classList.remove("scrolled");
        animation.setDirection(-1);
        animation.play();
        isScrolled = false;
      }

      // Reset animation flag after animation completes
      setTimeout(() => {
        isAnimating = false;
      }, animation.totalFrames ? (animation.totalFrames / animation.frameRate) * 1000 : 300);
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
