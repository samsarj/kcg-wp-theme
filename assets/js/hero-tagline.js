const texts = [
  ["Building", "God's", "church"],
  ["with", "God's", "word"],
  ["for", "God's", "glory"],
];

let currentSet = 0;
const line1 = document.getElementById("line1");
const line2 = document.getElementById("line2");
const line3 = document.getElementById("line3");

function animateText(line, newText) {
  gsap.to(line, {
    opacity: 0,
    scale: 0.5,
    rotationX: 180,
    duration: 0.5,
    onComplete: () => {
      line.textContent = newText;
      gsap.to(line, {
        opacity: 1,
        scale: 1,
        rotationX: 0,
        duration: 0.5,
      });
    },
  });
}

function updateText() {
  const nextSet = (currentSet + 1) % texts.length;

  if (texts[currentSet][0] !== texts[nextSet][0]) {
    animateText(line1, texts[nextSet][0]);
  }
  if (texts[currentSet][1] !== texts[nextSet][1]) {
    animateText(line2, texts[nextSet][1]);
  }
  if (texts[currentSet][2] !== texts[nextSet][2]) {
    animateText(line3, texts[nextSet][2]);
  }

  currentSet = nextSet;
}

setInterval(updateText, 3000);
