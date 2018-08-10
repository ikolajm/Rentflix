<?php

include "includes/data.php";
include "includes/functions.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  if (isset($catalog[$id])) {
    $item = $catalog[$id];
  }
}

if (!isset($item)) {
  header("location:catalog.php");
  exit;
}

$pageTitle = $item["title"];

$section = null;

include 'includes/header.php';

?>

<section id="details">

  <div class="media-image">
    <a href="catalog.php?cat=<?php echo strtolower($item["category"]); ?>"><i class="fas fa-arrow-left"></i> Back to list</a>
    <img src="<?php echo $item["img"];?>" alt="<?php echo $item["title"];?>" />
  </div>

  <div class="media-details">
    <h1><?php echo $item["title"]; ?></h1>

    <table>
      <tr>
        <th>Category:</th>
        <td><?php echo $item["category"]; ?></td>
      </tr>
      <tr>
        <th>Genre:</th>
        <td><?php echo implode(", ", $item["genre"]); ?></td>
      </tr>


      <?php
      if (strtolower($item["category"]) == "movies") {
      ?>
      <tr>
        <th>Year:</th>
        <td><?php echo $item["year"]; ?></td>
      </tr>
        <tr>
          <th>Director(s):</th>
          <td><?php echo implode(", ", $item["director"]); ?></td>
        </tr>
        <tr>
          <th>Writer(s):</th>
          <td><?php echo implode(", ", $item["writers"]); ?></td>
        </tr>
        <tr>
          <th>Stars:</th>
          <td><?php echo implode(", ", $item["stars"]); ?></td>
        </tr>
        <?php } ?>

        <?php
        if (strtolower($item["category"]) == "tv") {
        ?>
        <tr>
          <th>Years Aired:</th>
          <td><?php echo $item["years aired"]; ?></td>
        </tr>
          <tr>
            <th>Creator(s):</th>
            <td><?php echo implode(", ", $item["creators"]); ?></td>
          </tr>
          <tr>
            <th>Stars:</th>
            <td><?php echo implode(", ", $item["stars"]); ?></td>
          </tr>
          <?php } ?>

    </table>
  </div>


</section>

<?php include "includes/footer.php" ?>
