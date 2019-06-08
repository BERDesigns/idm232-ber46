</head>
<body>
  <div class="wrapper">
    <div id="navbar-header">
      <div class="navbar-div" id="logo-div">
        <a id="logo-btn" href="index.php">
          <object id="logo-obj" data="img/logo.svg" type="image/svg+xml">
            <img src="img/logo.png" alt="Aeat Logo">
          </object>
        </a>
      </div>
      <a class="navbar-txt-item" href="index.php">Home</a>
      <a class="navbar-txt-item" href="search.php">Browse</a>
      <a class="navbar-txt-item" href="recipe.php?id=<?php echo mt_rand(1, 40);?>">A Recipe</a>
      <a class="navbar-txt-item" href="help.php">Help</a>
      <div class="navbar-div mobile-right-divs" id="search-div">
        <a id="search-btn" href="search.php">
          <object id="search-obj" data="img/search.svg" type="image/svg+xml">
            <img src="img/search.png" alt="Search">
          </object>
        </a>
      </div>
      <div class="navbar-div mobile-right-divs" id="dd-menu-div">
        <object id="dd-menu-obj" data="img/hamburger.svg" type="image/svg+xml">
          <img src="img/hamburger.png" alt="Hamburger">
        </object>
      </div>
    </div>
    <div id="dd-menu-pullout-menu">
      <a class="menu-item" id="home-btn-pullout-menu" href="index.php">Home</a>
      <a class="menu-item" id="x-mark-pullout-menu" href="#">&#10005;</a>
      <a class="menu-item" href="search.php">Browse</a>
      <a class="menu-item" href="recipe.php?id=<?php echo mt_rand(1, 40);?>">Random Recipe</a>
      <a class="menu-item" href="help.php">Help</a>
    </div>
    <div id="main-pg">
