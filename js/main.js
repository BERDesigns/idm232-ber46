document.getElementById("filters-options").style.width = window.innerWidth - 32 + "px";
document.getElementById("searchbar-div").style.width = window.innerWidth - 16 + "px";

document.getElementById("main-pg").style.minHeight = (window.innerHeight - document.getElementById("navbar-header").getBoundingClientRect().height - document.getElementById("navbar-header").getBoundingClientRect().height) + "px";

document.getElementById("dd-menu-div").addEventListener("click", function() {
    document.getElementById("dd-menu-pullout-menu").style.left = "10%"; // Pull the main dropdown leftwards, into the client.
    document.getElementById("x-mark-pullout-menu").style.right = "0%";
  }, false);

document.getElementById("x-mark-pullout-menu").addEventListener("click", function() {
    document.getElementById("dd-menu-pullout-menu").style.left = "100%"; // Push the main dropdown rightwards, outside of the client.
    document.getElementById("x-mark-pullout-menu").style.right = "-100%";
  }, false);
