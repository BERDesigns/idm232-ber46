<?php
  include "includes/functions.php";
  include "includes/_header.php";
?>

<div id="searchbar-div">
  <img id="filter-icon" src="img/filter.png"></img>
  <form id="search-form">
    <input type="text" name="search">
  </form>
</div>
<div id="filters-options">
  <h4>Dietary Restrictions</h4>
  <ul class="filter-ul">
    <li>Vegan</li>
    <li>Vegetarian</li>
    <li>Pescatarian</li>
    <li>Lactose Intolerant</li>
    <li>Gluten-Free</li>
  </ul>
</div>
<div id="main-desc" class="main-desc-search">
  <div id="spacing-div-search-no-results">
    <h2 class="title">Sorry, but we couldn't find anything!</h2>
    <p>Try checking your spelling. You can also try words with a similar meaning, like "tart" instead of "pie".
  </div>
</div>
<?php include "includes/_footer.php"; ?>
