(function () {
  "use strict";

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector(".mobile-nav-toggle");

  function mobileNavToogle() {
    document.querySelector("body").classList.toggle("mobile-nav-active");
    mobileNavToggleBtn.classList.toggle("bi-list");
    mobileNavToggleBtn.classList.toggle("bi-x");
  }
  mobileNavToggleBtn.addEventListener("click", mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll("#navmenu a").forEach((navmenu) => {
    navmenu.addEventListener("click", () => {
      if (document.querySelector(".mobile-nav-active")) {
        mobileNavToogle();
      }
    });
  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll(".navmenu .toggle-dropdown").forEach((navmenu) => {
    navmenu.addEventListener("click", function (e) {
      e.preventDefault();
      this.parentNode.classList.toggle("active");
      this.parentNode.nextElementSibling.classList.toggle("dropdown-active");
      e.stopImmediatePropagation();
    });
  });

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector(".scroll-top");

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100
        ? scrollTop.classList.add("active")
        : scrollTop.classList.remove("active");
    }
  }
  scrollTop.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });

  window.addEventListener("load", toggleScrollTop);
  document.addEventListener("scroll", toggleScrollTop);

  /**
   * Initiate Pure Counter
   */
  new PureCounter();
})();

$.ajaxSetup({
  headers: {
    "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content"),
  },
});

function removeFromCart(button) {
  const cartId = $(button).data("id");

  $.ajax({
    url: removeFromCartUrl,
    type: "POST",
    data: { id: cartId },
    success: function (response) {
      $(button).closest(".order-item").remove();

      alert("Item removed successfully");

      let total_items = parseFloat($("#total_items").text());
      total_items -= 1;
      $("#total_items").text(total_items);
      if (total_items === 0) {
        $("#empty_cart_message").show();
        $("#summary").hide();
        $("#billing").hide();
      }

      const priceElement = $(button)
        .closest(".order-item")
        .find(".order-item-price");
      const itemPrice = parseFloat(priceElement.text());

      let subtotal = parseFloat($("#subtotal-value").text());

      subtotal -= itemPrice;

      $("#subtotal-value").text(subtotal.toFixed(2));
      $("#chargeAmount").text(subtotal.toFixed(2));

      let currentCount = parseInt($("#cart-item-count").text());
      $("#cart-item-count").text(currentCount - 1);

    },
    error: function () {
      alert("Error removing item");
    },
  });
}
