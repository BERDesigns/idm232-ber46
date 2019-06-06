<?php
  include "includes/init.php";
?>
<div id="index-welcome">
  <h1 class="title" id="welcome-text">Welcome!</h1>
</div>
<div id="main-desc">
  <p><b>&#198;at</b> <i>(v)</i> :<br>To share a delicious home-cooked meal with friends and family.<br><br>Hello, bonjour, hola, and kon'nichiwa! Here at &#198;at, we believe that food brings people together. We're focused on bringing you healthy, delicious recipes that you can share with your loved ones. So go on...</p>
  <a id="amazing-btn" href="recipe.php?id=<?php echo mt_rand(1, 40);?>">make something amazing!</a>
  <p>Still don't know where to start? Why not try out one of these curated recipes:</p>
</div>
<div class="card-holder">
<?php

  $rand_a = mt_rand(1, 40);
  $rand_b = mt_rand(1, 40);
  $rand_c = mt_rand(1, 40);

  while(($rand_a == $rand_b) || ($rand_a == $rand_c) || ($rand_b == $rand_c)) {
    $rand_a = mt_rand(1, 40);
    $rand_b = mt_rand(1, 40);
    $rand_c = mt_rand(1, 40);
  }

  for($i = 0; $i <= 3; $i++) {
    $query = 'SELECT * ';
    $query .= 'FROM recipes ';
    if ($i == 0) {
      $temp_num = $rand_a;
      $query .= "WHERE id = '{$rand_a}' ";
    } elseif ($i == 1) {
      $temp_num = $rand_b;
      $query .= "WHERE id = '{$rand_b}' ";
    } else {
      $temp_num = $rand_c;
      $query .= "WHERE id = '{$rand_c}' ";
    }
    $query .= 'LIMIT 1';

    $result = mysqli_query($connection, $query);

    if (!$result) {
      die('Database query failed.');
    }

    while ($recipe = mysqli_fetch_assoc($result)) {
?>
  <div class="card">
    <a href="recipe.php?id=<?php echo $temp_num ?>">
      <img class="card-img" src="img/recipe_pics/<?php echo $recipe['recipe_folder']; ?>/beauty_pic.jpg">
      <div class="container">
        <h4 class="title card-text"><?php echo $recipe['title']; ?></h4>
        <p class="card-text">with <?php echo $recipe['side']; ?></p>
      </div>
    </a>
  </div>
<?php
    } // end while loop.
    mysqli_free_result($result);
  }
?>
</div>
<?php include "includes/_footer.php"; ?>
