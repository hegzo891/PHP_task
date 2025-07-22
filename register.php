<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validation
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        exit("❌ All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("❌ Invalid email format.");
    }

    if ($password !== $confirm_password) {
        exit("❌ Passwords do not match.");
    }

    // Password strength check
    // $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    // if (!preg_match($regex, $password)) {
    //     exit("❌ Password must be at least 8 characters long and include uppercase, lowercase letters, and a number.");
    // }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        exit("❌ Email already exists.");
    }
    $stmt->close();

    // Hash the password and insert the new user
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "✅ Registration successful!";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
