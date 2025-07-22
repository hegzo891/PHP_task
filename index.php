<?php
// Start session for error handling
session_start();
// Clear previous errors
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Registration Form</title>
  <style>
    .error {
      color: red;
    }
  </style>
</head>

<body>
  <?php if (!empty($errors)): ?>
    <div class="error">
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="register.php" method="POST">
    <input type="text" name="name" placeholder="Name"
      value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required><br>

    <input type="email" name="email" placeholder="Email"
      value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required><br>

    <input type="password" name="password" placeholder="Password" required><br>

    <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>

    <button type="submit">Register</button>
  </form>
</body>

</html>