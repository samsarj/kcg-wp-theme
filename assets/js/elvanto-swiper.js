jQuery(document).ready(function ($) {


  // $("#elvanto-events-9323").wrap('<div class="elvanto"></div>');

  $(".elvanto-calendar-events-title").wrap("<h4></h4>");
  $(".elvanto-calendar-events-title").each(function() {
    var updatedText = $(this).html().replace(/\s*\|\s*/g, '<br>');
    $(this).html(updatedText);
  });

  $(".elvanto-calendar-events-date").wrap("<h5></h5>");

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
