<?php

include 'includes/header.php';
include "includes/data.php";
include "includes/functions.php";

$pageTitle = "Rentflix";

?>

  <section>

    <h1>May We Suggest Something?</h1>

    <ul class="catalog-items">

      <?php

      // Get 4 random selections from data to "suggest"
      $random = array_rand($catalog, 4);

      foreach ($random as $id) {
        echo get_item_html($id, $catalog[$id]);
      }

      ?>

    </ul>

  </section>

<?php include 'includes/footer.php';?>
