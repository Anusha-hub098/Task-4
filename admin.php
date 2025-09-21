<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
  die("Access denied. Only admin can see this.");
}
echo "Welcome Admin!";
?>
