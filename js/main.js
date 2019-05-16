document.getElementById("dd-menu-div").addEventListener("click", function() {
    document.getElementById("dd-menu-pullout-menu").style.left = "10%";
  }, false);

document.getElementById("x-mark-pullout-menu").addEventListener("click", function() {
    document.getElementById("dd-menu-pullout-menu").style.left = "100%";
  }, false);

var filtOut = false;

document.getElementById("filter-icon").addEventListener("click", function() {
    if (filtOut == false) {
      document.getElementById("filters-options").style.top = document.getElementById("searchbar-div").getBoundingClientRect().bottom-10+"px";
      filtOut = true;
    }
    else {
      document.getElementById("filters-options").style.top = "-50%";
      filtOut = false;
    }
  }, false);
