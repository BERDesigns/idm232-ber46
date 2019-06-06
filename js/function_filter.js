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
