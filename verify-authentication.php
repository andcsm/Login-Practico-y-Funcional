<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    header('location: index.html');
    exit();
  }
?>