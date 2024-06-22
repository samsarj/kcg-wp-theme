jQuery(document).ready(function ($) {
  $(".elvanto-calendar-events-title").wrap("<h3></h3>");

  $(".elvanto-calendar-events-date").wrap("<h4></h4>");

  $("[data-elvanto-url]").on("click", function () {
    setTimeout(function () {
      $(".elvanto-modal-header")
        .contents()
        .filter(function () {
          return this.nodeType === 3; // Node type 3 is a text node
        })
        .wrap("<h3></h3>");

      // Change the button text to a cross
      $(".elvanto-modal-close").html("&#215;"); // HTML entity for ×
    }, 100); // Adjust delay as needed to ensure the modal content is loaded
  });
});
