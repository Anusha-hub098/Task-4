<?php include "db.php"; ?>
<form method="post">
  <input type="email" name="email" required placeholder="Enter email">
  <input type="password" name="password" required minlength="6" placeholder="Enter password">
  <button type="submit" name="register">Register</button>
</form>

<?php
if (isset($_POST['register'])) {
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $email, $password);

  if ($stmt->execute()) {
    echo "User registered successfully!";
  } else {
    echo "Error: " . $stmt->error;
  }
}
?>
