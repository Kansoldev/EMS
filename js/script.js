(function () {
  "use strict";
  /*jslint browser: true*/
  /*global $, jQuery, alert*/
  // Defaultly Hiding sidebar Overlay
  $("#sidebar_overlay").hide();

  // Tooltip

  if ($('[data-toggle="tooltip"]').length > 0) {
    $('[data-toggle="tooltip"]').tooltip();
  }
  // Select 2

  if ($(".select").length > 0) {
    $(".select").select2({
      minimumResultsForSearch: -1,
      width: "100%",
    });
  }

  $(window).on("load", function () {
    $("#loader").delay(100).fadeOut("slow");
    $("#loader-wrapper").delay(500).fadeOut("slow");
    $("body").delay(500).css({ overflow: "visible" });
  });

  //sidebar open and close
  $(document).on("click", "#open_navSidebar", function () {
    $("#offcanvas_menu").css("width", "250px");
    $("#sidebar_overlay").show();
    $(".inner-wrapper").css("overflow", "hidden");
  });

  $(document).on("click", "#close_navSidebar", function () {
    $("#offcanvas_menu").css("width", "0px");
    $("#sidebar_overlay").hide();
    $(".inner-wrapper").css("overflow", "scroll");
  });

  $(document).on("click", "#sidebar_overlay", function () {
    $("#offcanvas_menu").css("width", "0px");
    $("#sidebar_overlay").hide();
  });

  /*================================
    stickey sidebar
    ==================================*/

  if ($(window).width() > 767) {
    if ($(".theiaStickySidebar").length > 0) {
      $(".theiaStickySidebar").theiaStickySidebar({
        // Settings
        additionalMarginTop: 20,
      });
    }
  }
})();

// Inspect keyCode

$(window).on("load", function () {
  document.onkeydown = function (e) {
    if (e.keyCode == 123) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == "I".charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.keyCode == "U".charCodeAt(0)) {
      return false;
    }

    if (e.ctrlKey && e.shiftKey && e.keyCode == "C".charCodeAt(0)) {
      return false;
    }
  };
});

document.oncontextmenu = function () {
  return false;
};
$(document).mousedown(function (e) {
  if (e.button == 2) {
    return false;
  }
  return true;
});

if (document.querySelector(".fa-eye")) {
  document.querySelector(".fa-eye").addEventListener("click", (e) => {
    const passwordFieldID = document.querySelector("#password");

    if (passwordFieldID.type === "password") {
      passwordFieldID.type = "text";
      e.target.classList.remove("fa-eye");
      e.target.classList.add("fa-eye-slash");
    } else {
      passwordFieldID.type = "password";
      e.target.classList.remove("fa-eye-slash");
      e.target.classList.add("fa-eye");
    }
  });
}
