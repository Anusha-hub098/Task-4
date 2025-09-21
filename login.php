<?php 
include "db.php"; 
session_start();
?>
<form method="post">
  <input type="email" name="email" required>
  <input type="password" name="password" required>
  <button type="submit" name="login">Login</button>
</form>

<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['role'] = $user['role'];
    echo "Login successful!<br>";
    if ($user['role'] == 'admin') {
      echo "<a href='admin.php'>Go to Admin Page</a>";
    } else {
      echo "<a href='dashboard.php'>Go to Dashboard</a>";
    }
  } else {
    echo "Invalid credentials!";
  }
}
?>
