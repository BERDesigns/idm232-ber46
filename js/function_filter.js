document.getElementById("filter-icon").addEventListener("click", function() {
    if (filtOut == false) {
      document.getElementById("filters-options").style.top = document.getElementById("searchbar-div").getBoundingClientRect().bottom-10+"px"; // Set the top of the Filters dropdown to the bottom of the Searchbar div (the element that goes above it).
      document.getElementsByClassName("results-holder")[0].style.transform = "translateY(124px)"; // Transform the search results as the filters tab gets pushed downwards.
      document.getElementsByClassName("results-holder")[0].style.height = document.getElementsByClassName("results-holder")[0].offsetHeight + 124 + "px"; // Adjust the height of the results holder accordingly to push the footer downwards.
      setTimeout(function(){ document.getElementById("filters-options").style.zIndex = 0; }, 300);
      filtOut = true;
    }
    else {
      document.getElementById("filters-options").style.zIndex = -10;
      document.getElementById("filters-options").style.top = "-50%"; // Set the top of the Filters dropdown to an arbitrary position outside of the client to hide it.
      document.getElementsByClassName("results-holder")[0].style.transform = "translateY(0px)"; // Transform the search results as the filters tab gets pushed upwards.
      document.getElementsByClassName("results-holder")[0].style.height = document.getElementsByClassName("results-holder")[0].offsetHeight - 124 + "px"; // Adjust the height of the results holder accordingly to push the footer upwards.
      filtOut = false;
    }
  }, false);
