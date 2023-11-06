<?php
session_start();

// Authorized
if ($_SESSION["Role"] == null) {
  header("Location: landing.php");
  exit;
} else {
  if ($_SESSION["Role"] == "admin") {
    header("Location: src/admin/dashboard.php");
    exit;
  } else if ($_SESSION["Role"] == "user") {
    header("Location: src/user/dashboard.php");
    exit;
  }
}


