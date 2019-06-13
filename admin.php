<?php
  include "includes/init.php";

  echo "<title>AEAT | Admin Panel</title>";

  include "includes/_header_admin.php";

  if (isset($_POST['submit'])) {
    $recipe_title = mysqli_real_escape_string($connection, $_POST['recipeTitle']);
    $recipe_side = mysqli_real_escape_string($connection, $_POST['recipeSide']);
    $recipe_description = mysqli_real_escape_string($connection, $_POST['recipeDescription']);
    $recipe_ingredients = mysqli_real_escape_string($connection, str_replace("\n", "\\", $_POST['recipeIngredients']));
    $recipe_steps = mysqli_real_escape_string($connection, str_replace("\n", "\\", $_POST['recipeSteps']));
    $recipe_filters = mysqli_real_escape_string($connection, $_POST['recipeFilters']);

    // Validation
    $errors = array();
    $required_fields = array(
      'recipeTitle',
      'recipeSide',
      'recipeDescription',
      'recipeIngredients',
      'recipeSteps',
    );
    foreach ($required_fields as $field) {
      $value = trim($_POST[$field]);
      if (!isset($value) || $value == '') {
        $errors[$field] = $field . ' can\'t be blank';
      }
    }

    if (!empty($errors)) {
      redirect_to("admin.php");
    }

    $recipe_hero_path = "Recipe_" . str_replace(" ", "_", $_POST['recipeTitle']) . "_with_" . str_replace(" ", "_", $_POST['recipeSide']);

    $target_dir = "img/recipe_pics/" . $recipe_hero_path;

    mkdir($target_dir, 0777, true);

    $maxDim = 500;
    $file_name = $_FILES['recipeHero']['tmp_name'];
    list($width, $height, $type, $attr) = getimagesize( $file_name );
    if ( $width > $maxDim || $height > $maxDim ) {
        $target_filename = $file_name;
        $ratio = $width/$height;
        if( $ratio > 1) {
            $new_width = $maxDim;
            $new_height = $maxDim/$ratio;
        } else {
            $new_width = $maxDim*$ratio;
            $new_height = $maxDim;
        }
        $src = imagecreatefromstring( file_get_contents( $file_name ) );
        $dst = imagecreatetruecolor( $new_width, $new_height );
        imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
        imagedestroy( $src );
        imagejpeg( $dst, $target_dir . "/beauty_pic_500.jpg"); // adjust format as needed
        imagedestroy( $dst );
    }

    $target_file = $target_dir . basename($_FILES["recipeHero"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["recipeHero"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["recipeHero"]["size"] > 2000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    if($imageFileType != "jpg") {
      echo "Sorry, for the hero image, only JPG files are allowed.";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["recipeHero"]["tmp_name"], $target_dir . "/beauty_pic.jpg")) {
        echo "The file ". basename( $_FILES["recipeHero"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $target_file = $target_dir . basename($_FILES["recipeIngredients"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["recipeIngredients"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["recipeIngredients"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    if($imageFileType != "png") {
      echo "Sorry, for the ingredients image, only PNG files are allowed.";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["recipeIngredients"]["tmp_name"], $target_dir . "/ingredients.png")) {
        echo "The file ". basename( $_FILES["recipeIngredients"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $query = "INSERT INTO recipes (";
    $query .= "title, side, description, ingredients, steps, filters, recipe_folder";
    $query .= ") VALUES (";
    $query .= " '{$recipe_title}', '{$recipe_side}', '{$recipe_description}', '{$recipe_ingredients}', '{$recipe_steps}', '{$recipe_filters}', '{$recipe_hero_path}'";
    $query .= ")";

    error_log($query);

    $result = mysqli_query($connection, $query);

    if ($result) {
      $message = '<div class="alert alert-success" role="alert">Page updated!</div>';
    } else {
      $message = '<div class="alert alert-danger" role="alert">Page update failed.</div>';
    }
  }
?>
  <main class="col-md-9">
      <?php
        if (isset($message)) {
          echo "<p>{$message}</p>";
        }
       ?>
      <h1>Add Recipe</h1>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <div class="form-recipeHero">
          <label for="recipeHero">Recipe Hero Image</label>
          <input type="file" class="form-control" name="recipeHero" id="recipeHero" placeholder="filename" required>
        </div>
        <div class="form-group">
          <label for="recipeIngredients">Recipe Ingredients Image</label>
          <input type="file" class="form-control" name="recipeIngredients" id="recipeIngredients" placeholder="filename" required>
        </div>
        <div class="form-group">
          <label for="recipeTitle">Recipe Name</label>
          <input type="text" class="form-control" name="recipeTitle" id="recipeTitle" placeholder="My Recipe Title" required>
        </div>
        <div class="form-group">
          <label for="recipeSide">Recipe Side</label>
          <input type="text" class="form-control" name="recipeSide" id="recipeSide" placeholder="My Recipe Side" required>
        </div>
        <div class="form-group">
          <label for="recipeDescription">Recipe Description</label>
          <input type="text" class="form-control" name="recipeDescription" id="recipeDescription" placeholder="My Recipe Description" required>
        </div>
        <div class="form-group">
          <label for="recipeIngredients">Recipe Ingredients</label>
          <textarea class="form-control" name="recipeIngredients" id="recipeIngredients" placeholder="My Recipe Ingredients" required></textarea>
        </div>
        <div class="form-group">
          <label for="recipeSteps">Recipe Steps</label>
          <textarea class="form-control" name="recipeSteps" id="recipeSteps" placeholder="My Recipe Steps" required></textarea>
        </div>
        <div class="form-group">
          <label>Recipe Filters</label>
            <input type="checkbox" value="vegetarian">Vegetarian</input>
            <input type="checkbox" value="vegan">Vegan</input>
            <input type="checkbox" value="pescatarian">Pescatarian</input>
            <input type="checkbox" value="dairy-free">Dairy-Free</input>
            <input type="checkbox" value="gluten-free">Gluten-Free</input>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
      </form>
    </main>
<?php include "includes/_footer_admin.php"; ?>
