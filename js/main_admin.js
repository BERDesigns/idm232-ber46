var tabletMode = window.matchMedia("(min-width: 768px) and (max-width: 1279px)");

document.getElementById("main-pg").style.minHeight = (window.innerHeight - document.getElementById("navbar-header").getBoundingClientRect().height - document.getElementById("navbar-header").getBoundingClientRect().height) + "px";

function showHideRemoveBtn() {
  if(document.getElementsByClassName("admin-card").length > 1) {
    document.getElementById("remove-btn").classList.remove("hidden");
  }
  else {
    document.getElementById("remove-btn").classList.add("hidden");
  }
}

function getSteps() {
  if (document.getElementsByClassName("admin-card").length < 9) {
     return "0" + getStepsPlusOne();
   }
   return getStepsPlusOne();
}

function getStepsPlusOne() {
  return document.getElementsByClassName("admin-card").length + 1;
}

document.getElementById("add-btn").addEventListener("click", function() {
    var mainDiv = document.createElement("div");
    mainDiv.classList.add("admin-card");
    var domString = '<h4>Step ' + getSteps() + '</h4><label for="recipeStepImg' + getSteps() + '">Step Image<br /><span class="desc-class">Must be a JPG.</span></label><input type="file" class="form-control" name="recipeStepImg' + getSteps() + '" id="stepImg' + getSteps() + '" placeholder="filename" required><label for="recipeStepNames[]">Step Name</label><input type="text" class="form-control" name="recipeStepNames[]" id="stepName' + getSteps() + '" placeholder="Step Name" required><label for="recipeStepDescs[]">Step Description</label><textarea class="form-control" name="recipeStepDescs[]" id="stepDesc' + getSteps() + '1" placeholder="Step Description" required></textarea>';
    mainDiv.innerHTML = domString;
    document.getElementById("steps-holder").appendChild(mainDiv);
    showHideRemoveBtn();
  }, false);

  document.getElementById("remove-btn").addEventListener("click", function() {
      if (document.getElementsByClassName("admin-card").length > 1) {
        var stepsHolder = document.getElementById("steps-holder");
        stepsHolder.removeChild(document.getElementsByClassName("admin-card")[document.getElementsByClassName("admin-card").length - 1]);
      }
      showHideRemoveBtn();
    }, false);

showHideRemoveBtn();
