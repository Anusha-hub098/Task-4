<?php
session_start();
if (!isset($_SESSION['role'])) {
  die("Access denied. Please login.");
}
echo "Welcome to user dashboard!";
?>
