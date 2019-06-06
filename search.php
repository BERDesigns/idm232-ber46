<?php
  include "includes/init.php";
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
<?php
  $query_result = isset($_GET["search"]) ? $_GET["search"] : null;

  if (!$query_result) {
    $query = 'SELECT * ';
    $query .= 'FROM recipes';
  } else {
    $query = 'SELECT * ';
    $query .= 'FROM recipes ';
    $query .= "WHERE title LIKE '%{$query_result}%' OR side LIKE '%{$query_result}%' OR description LIKE '%{$query_result}%' OR ingredients LIKE '%{$query_result}%' OR steps LIKE '%{$query_result}%' ";
  }

  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Database query failed.');
  }
  elseif (mysqli_num_rows($result) == 0) {
    echo '<div id="main-desc" class="main-desc-search">
            <div id="spacing-div-search-no-results">
              <h2 class="title">Sorry, but we couldn\'t find anything!</h2>
              <p>Try checking your spelling. You can also try words with a similar meaning, like "tart" instead of "pie".
            </div>
          </div>';
  }
  else {
  echo '<div class="results-holder">';
  $i = 1;
  $num_rows = mysqli_num_rows($result);
  while ($recipe = mysqli_fetch_assoc($result)) {
    if ((($i % 4) == 1) && (($num_rows - $i - 1) > 0)) {
?>
    <div class="card-holder card-holder-search">
<?php }  elseif ((($i % 4) == 1) && (($num_rows - $i) <= 1)) {?>
  <div class="card-holder card-holder-search card-holder-end">
<?php }
      ?>
      <div class="card">
        <a href="recipe.php?id=<?php echo $recipe['id'] ?>">
          <img class="card-img" src="img/recipe_pics/<?php echo $recipe['recipe_folder']?>/beauty_pic.png">
          <div class="container">
            <h4 class="title card-text"><?php echo $recipe['title']; ?></h4>
            <p class="card-text">with <?php echo $recipe['side']; ?></p>
          </div>
        </a>
      </div>
  <?php
    if (($i % 4) == 0) {
  ?>
  </div>
  <?php }
        $i++;
      } //end while loop.
      if (!($num_rows % 4 == 0)) {
        echo '</div>';
      }
      echo '</div>';
    }
    mysqli_free_result($result);
?>
<script src ="js/function_filter.js"></script>

<?php include "includes/_footer.php"; ?>
