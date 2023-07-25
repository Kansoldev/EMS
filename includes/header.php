<?php
  // Check for the folder i am in (either admin or the root folder) to append the correct prefix
  $prefix = "";

  if (strpos($_SERVER['PHP_SELF'], "admin")) {
    $prefix = "../";
  }

  require_once $prefix . "config/config.php";

  if (isset($title)) {
    $title = "EMS | " . $title;
  } else {
    $title = "Login";
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo WEB_URL ?>img/favicon.png" />
    <link rel="stylesheet" href="<?php echo WEB_URL ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo WEB_URL ?>css/lnr-icon.css" />
    <link rel="stylesheet" href="<?php echo WEB_URL ?>css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo WEB_URL ?>css/style.css" />
    <title><?php echo $title ?? "Login" ?></title>
  </head>

  <body>