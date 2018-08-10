<!DOCTYPE html>
<html>
  <head>
  <meta lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!--GOOGLE FONTS-->
  <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Nanum+Gothic" rel="stylesheet">

  <!--JQ-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!--FONTAWESOME-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
  integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <!--BOOTSTRAP CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <!--MY CSS-->
  <link rel="stylesheet" href="css/styles.css" type="text/css">

  <title><?php echo $pageTitle; ?></title>
  </head>

  <body>

    <main>

      <div class="my-container">

        <header>

          <!--Title-->
          <a href="index.php"><h1 id=rentflix class="p-2">Rentflix</h1></a>

          <!--Nav-->
          <nav class="p-2">

            <!--Movies-->
            <div class="cat-contain">
              <a href="catalog.php?cat=movies"><h1 class="
                <?php if ($section == "movies") {echo "on";} ?>
                ">Movies</h1></a>
            </div>

            <!--TV-->
            <div class="cat-contain">
              <a href="catalog.php?cat=tv"><h1 class="
                <?php if ($section == "tv") {echo "on";} ?>
                ">TV</h1></a>
            </div>

            <!--Suggestions-->
            <div class="cat-contain">
              <a href="suggest.php"><h1 class="
                <?php if ($section == "suggest") {echo "on";} ?> ">Suggestions</h1></a>
            </div>

            <!--Search *AESTHETIC ONLY*-->
            <div id="search" class="cat-contain">
              <i class="fas fa-search"></i>
              <input type="search" placeholder="Search..">
            </div>

          </nav>

        </header>
