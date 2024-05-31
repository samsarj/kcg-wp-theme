// script.js

document.addEventListener("DOMContentLoaded", function() {
    const header = document.querySelector("header");
    const logo = document.querySelector(".logo");

    window.addEventListener("scroll", function() {
        if (window.scrollY > 100) {
            header.classList.remove("transparent");
            header.classList.add("solid");
            logo.classList.add('small');
        } else {
            header.classList.remove("solid");
            header.classList.add("transparent");
            logo.classList.remove('small');
        }
    });

    // Initialize the header state
    if (window.scrollY > 50) {
        header.classList.add("solid");
    } else {
        header.classList.add("transparent");
    }
});

