<?php
session_start();
include "db.php";

// Get role from URL (student / teacher)
$role = isset($_GET['role']) ? $_GET['role'] : '';

if ($_POST) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $selected_role = $_POST['role'];

    // Check user with role
    $res = $conn->query("SELECT * FROM users 
                         WHERE username='$u' 
                         AND password='$p' 
                         AND role='$selected_role'");

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();

        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'student') {
            header("Location: student_dashboard.php");
        } else {
            header("Location: teacher_dashboard.php");
        }
    } else {
        $error = "Invalid Login or Wrong Role!";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="login-container">

<form method="POST" class="card">

    <h2><?= ucfirst($role) ?> Login</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>

    <!-- Hidden role -->
    <input type="hidden" name="role" value="<?= $role ?>">

    <button type="submit">Login</button>

    <br><br>
    <a href="index.php" class="btn">⬅️ Back to Home</a>

</form>

</div>