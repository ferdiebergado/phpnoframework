<?php
require_once MODEL_PATH . 'User.php';
// define variables and set to empty values
$emailErr = $passwordErr = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($emailErr) && empty($passwordErr)) {
    if (verify_token($_POST['csrf_token'])) {
      $user = new User();
      $loggedin = $user->login($email, $password);
      if ($loggedin) {
        $view = new View('home');
        return $view->render();
      } else {
        $emailErr = 'Invalid username or password.';
      }
    }
  }
}
?>
