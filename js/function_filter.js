document.getElementById("filters-options").style.top = "-300px";
setTimeout(function(){ document.getElementById("filters-options").style.top = document.getElementById("navbar-header").getBoundingClientRect().bottom-document.getElementById("filters-options").offsetHeight+"px"; }, 300);

var resizePgOnSearch = false;
var resizePgOnFilters = false;

if (window.innerHeight < (document.getElementById("main-pg").getBoundingClientRect().height + document.getElementById("searchbar-div").getBoundingClientRect().height)) {
  resizePgOnSearch = true;
}

if (window.innerHeight < (document.getElementById("main-pg").getBoundingClientRect().height + document.getElementById("searchbar-div").getBoundingClientRect().height + document.getElementById("filters-options").getBoundingClientRect().height)) {
  resizePgOnFilters = true;
}


var filtOut = false;

document.getElementById("filter-icon").addEventListener("click", function() {
    if (filtOut == false) {
      document.getElementById("filters-options").style.top = document.getElementById("searchbar-div").getBoundingClientRect().bottom+"px"; // Set the top of the Filters dropdown to the bottom of the Searchbar div (the element that goes above it).
      var filtOffset = document.getElementById("filters-options").offsetHeight + document.getElementById("searchbar-div").offsetHeight;
      document.getElementById("main-pg").style.transform = "translateY(" + filtOffset + "px)"; // Transform the search results as the filters tab gets pushed downwards.
      if (resizePgOnFilters == true){
        document.getElementById("main-pg").style.height = document.getElementById("main-pg").offsetHeight + document.getElementById("filters-options").offsetHeight + "px"; // Adjust the height of the results holder accordingly to push the footer downwards.
      }
      setTimeout(function(){ document.getElementById("filters-options").style.zIndex = 0; }, 300);
      filtOut = true;
    }
    else {
      document.getElementById("filters-options").style.zIndex = -10;
      document.getElementById("filters-options").style.top = document.getElementById("searchbar-div").getBoundingClientRect().bottom-document.getElementById("filters-options").offsetHeight+"px"; // Set the top of the Filters dropdown to an arbitrary position outside of the client to hide it.
      document.getElementById("main-pg").style.transform = "translateY(" + document.getElementById("searchbar-div").offsetHeight + "px)"; // Transform the search results as the filters tab gets pushed upwards.
      if (resizePgOnFilters == true) {
        document.getElementById("main-pg").style.height = document.getElementById("main-pg").offsetHeight - document.getElementById("filters-options").offsetHeight + "px"; // Adjust the height of the results holder accordingly to push the footer downwards.
      }
      filtOut = false;
    }
  }, false);

  var searchOut = false;

  document.getElementById("search-btn").addEventListener("click", function() {
      if (searchOut == false) {
        document.getElementById("searchbar-div").style.top = document.getElementById("navbar-header").getBoundingClientRect().bottom+"px"; // Set the top of the Filters dropdown to the bottom of the Searchbar div (the element that goes above it).
        document.getElementById("main-pg").style.transform = "translateY(" + document.getElementById("searchbar-div").offsetHeight + "px)"; // Transform the search results as the filters tab gets pushed downwards.
        if (resizePgOnSearch == true) {
          document.getElementById("main-pg").style.height = document.getElementById("main-pg").offsetHeight + document.getElementById("searchbar-div").offsetHeight + "px"; // Adjust the height of the results holder accordingly to push the footer downwards.
        }
        setTimeout(function(){ document.getElementById("searchbar-div").style.zIndex = 50; }, 300);
        searchOut = true;
      }
      else {
        document.getElementById("searchbar-div").style.zIndex = -5;
        document.getElementById("searchbar-div").style.top = "0px"; // Set the top of the Filters dropdown to an arbitrary position outside of the client to hide it.
        document.getElementById("filters-options").style.top = document.getElementById("navbar-header").getBoundingClientRect().bottom-document.getElementById("filters-options").offsetHeight+"px";
        document.getElementById("main-pg").style.transform = "translateY(0px)"; // Transform the search results as the filters tab gets pushed upwards.
        if (resizePgOnSearch == true) {
          document.getElementById("main-pg").style.height = document.getElementById("main-pg").offsetHeight - document.getElementById("searchbar-div").offsetHeight + "px"; // Adjust the height of the results holder accordingly to push the footer downwards.
        }
        searchOut = false;
        filtOut = false;
      }
    }, false);
