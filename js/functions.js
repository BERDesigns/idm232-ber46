function selectOnlyThis(id){
  if (id.checked == true) {
    var filtersList = document.getElementsByName("filtersList");
    Array.prototype.forEach.call(filtersList,function(el){
      el.checked = false;
    });
    id.checked = true;
    showResults(id.value);
  }
  else {
    showResults("");
  }
}

// Function to show the filtered results.
function showResults(str) {
  var xhttp;
  if (str == "") {
    wipeCards("card", "hidden");
    return;
  }
  wipeCards("card", "hidden");
  hideAllCards("card", "hidden");
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var fixedStr = this.responseText.replace("[", "");
      fixedStr = fixedStr.replace("]", "");
      var strArray = fixedStr.split(",");
      for(var i = 0 ; i < strArray.length ; i++) {
        console.log(strArray[i]);
      }
    }
  };
  xhttp.open("GET", "includes/getrecipes.php?q="+str, true);
  xhttp.send();
}

//Wipe a given class <wipeClassName> from all elements on a page of class <cardClassName>
function wipeCards(cardClassName, wipeClassName) {
  var cardList = document.getElementsByClassName(cardClassName);
  for (var i = 0 ; i < cardList.length ; i++) {
    cardList[i].classList.remove(wipeClassName);
  }
}

//Add a given class <hideClassName> from all elements on a page of class <cardClassName>
function hideAllCards(cardClassName, hideClassName) {
  var cardList = document.getElementsByClassName(cardClassName);
  for (var i = 0 ; i < cardList.length ; i++) {
    cardList[i].classList.add(hideClassName);
  }
}

//Remove a given class <wipeClassName> from all elements on a page of class <cardClassName> with given id <id>
function showSelectCard(cardClassName, hideClassName, id) {
  document.getElementById("recipe-" + id).classList.remove(hideClassName);
}
