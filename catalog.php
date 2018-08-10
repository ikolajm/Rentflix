<?php

include "includes/data.php";
include "includes/functions.php";

$pageTitle = "Full Catalog";

// Show full catalog by default, used later for active class "on"
$section = null;

// Look to set subcategory of search
if (isset($_GET["cat"])) {
  // If subcategory is set, set title of page accordingly
  if ($_GET["cat"] == "movies") {
    $pageTitle = "All Movies";
    $section = "movies";
  } else if ($_GET["cat"] == "tv") {
    $pageTitle = "All TV Shows";
    $section = "tv";
  } else if ($_GET["cat"] == "recent") {
    $pageTitle = "Recently Added";
    $section = "recent";
  }
}
// If subcategory is not set, use intial variable

include 'includes/header.php';?>

  <section id="catalog">
    <h1 class="catalog-title"><?php
    if ($section != null) {
      echo "<a href='catalog.php'>Full Catalog</a> &gt ";
    }
    echo $pageTitle; ?></h1>

    <ul class="catalog-items">

      <?php

      $categories = array_category($catalog,$section);

      foreach ($categories as $id) {
        echo get_item_html($id,$catalog[$id]);
      }

      ?>

    </ul>

  </section>

<?php include 'includes/footer.php';?>
