// Change the main-page div's minimum height to be the full pg height minus the header and footer, ensures that the page footer doesn't show up too early.
document.getElementById("main-pg").style.minHeight = (window.innerHeight - document.getElementById("navbar-header").getBoundingClientRect().height - document.getElementById("navbar-header").getBoundingClientRect().height) + "px";

document.getElementById("dd-menu-div").addEventListener("click", function() {
    document.getElementById("dd-menu-pullout-menu").style.left = "10%"; // Pull the main dropdown leftwards, into the client.
  }, false);

document.getElementById("x-mark-pullout-menu").addEventListener("click", function() {
    document.getElementById("dd-menu-pullout-menu").style.left = "100%"; // Push the main dropdown rightwards, outside of the client.
  }, false);

var filtOut = false;

document.getElementById("filter-icon").addEventListener("click", function() {
    if (filtOut == false) {
      document.getElementById("filters-options").style.top = document.getElementById("searchbar-div").getBoundingClientRect().bottom-10+"px"; // Set the top of the Filters dropdown to the bottom of the Searchbar div (the element that goes above it).
      filtOut = true;
    }
    else {
      document.getElementById("filters-options").style.top = "-50%"; // Set the top of the Filters dropdown to an arbitrary position outside of the client to hide it.
      filtOut = false;
    }
  }, false);
