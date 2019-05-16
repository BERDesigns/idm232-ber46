<?php
  include "includes/functions.php";
  include "includes/_header.php";
?>
<div id="main-pg">
  <div id="index-welcome">
    <h1 class="title" id="welcome-text">Welcome!</h1>
  </div>
  <div id="main-desc">
    <p><b>&#198;at</b> <i>(v)</i> :<br>To share a delicious home-cooked meal with friends and family.<br><br>Hello, bonjour, hola, and kon'nichiwa! Here at &#198;at, we believe that food brings people together. We're focused on bringing you healthy, delicious recipes that you can share with your loved ones. So go on...</p>
    <a id="amazing-btn" href="recipe.php">make something amazing!</a>
    <p>Still don't know where to start? Why not try out one of these curated recipes:</p>
  </div>
  <div id="card-holder">
    <div class="card">
      <a href="recipe.php">
        <img class="card-img" src="img/01_example_pic.png">
        <div class="container">
          <h4 class="title card-text">Mushroom & Potato Tacos</h4>
          <p class="card-text">with Romaine & Orange Salad</p>
        </div>
      </a>
    </div>
    <div class="card">
      <img class="card-img" src="img/02_example_pic.png">
      <div class="container">
        <h4 class="title card-text">Parmesan-Crusted Chicken</h4>
        <p class="card-text">with Mashed Sweet Potatoes & Roasted Broccoli</p>
      </div>
    </div>
    <div class="card" id="last-card">
      <img class="card-img" src="img/03_example_pic.png">
      <div class="container">
        <h4 class="title card-text">Shiitake & Hoisin Beef Burgers</h4>
        <p class="card-text">with Miso Mayonnaise & Roasted Sweet Potatoes</p>
      </div>
    </div>
  </div>
</div>
<?php include "includes/_footer.php"; ?>
