<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'vendor/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/src/Exception.php';


// If form has been submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
  $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
  $details = trim(filter_input(INPUT_POST, "details", FILTER_SANITIZE_SPECIAL_CHARS));

  if ($name == "" || $email == "" || $details == "") {
    echo "Please make sure all fields are filled in.";
    exit;
  }

  if ($_POST["address"] != "") {
    echo "Invalid input!";
    exit;
  }

  if (!PHPMailer::validateAddress($email)) {
    echo "Invalid email address!";
    exit;
  }

  echo "<pre>";

    $email_body = "";
    $email_body .= "Name: " . $name . "\n\n";
    $email_body .= "Email: " . $email . "\n\n";
    $email_body .= "Details: " . $details . "\n\n";

    echo $email_body;

  echo "</pre>";

    //Import simple PHPMailer script
    $mail = new PHPMailer;
    $mail->setFrom('ikeman1998@gmail.com', 'Jake');
    $mail->addAddress('myfriend@example.net', 'My Friend');
    $mail->Subject  = 'Library suggestion from ' . $name;
    $mail->Body     = $details;
    if(!$mail->send()) {
      echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }

  //Redirect
  header("location:suggest.php?status=thanks");
}

$pageTitle = "Suggest an item";

$section = "suggest";

include 'includes/header.php'; ?>

  <section id="suggest">

    <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
      echo "<h1>Thank you for your suggestion!</h1>";
    } else { ?>

      <h1>Suggest a Movie/TV show you would like to see here!</h1>

      <form action="suggest.php" method="post">

        <table>

          <tr>
            <th><label for="name">Name:</label></th>
            <td><input type="text" id="name" name="name" /></td>
          </tr>

          <tr>
            <th><label for="email">Email:</label></th>
            <td><input type="text" id="email" name="email" /></td>
          </tr>

          <tr>
            <th><label for="details">Suggestion<br />Details:</label></th>
            <td><textarea type="textarea" id="details" name="details" row=80 col=10></textarea></td>
          </tr>

          <!--Further validation-->
          <tr style="display:none">
            <th><label for="address">Leave this form blank</label></th>
            <td><input type="text" id="address" name="address" /></td>
          </tr>

        </table>

        <input id="button" type="submit" value="Submit" />

      </form>

    <?php } ?>

  </section>

<?php include 'includes/footer.php';?>
