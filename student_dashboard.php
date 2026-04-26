<?php
session_start();
include "db.php";

$id = $_SESSION['id'];

$data = $conn->query("SELECT * FROM students WHERE user_id=$id")->fetch_assoc();
?>

<link rel="stylesheet" href="style.css">

<div class="card">
    <h2>Student Dashboard</h2>

    <p>Name: <?= $data['name'] ?></p>
    <p>Roll: <?= $data['roll_no'] ?></p>
    <p>Dept: <?= $data['dept'] ?></p>
    <p>Email: <?= $data['email'] ?></p>

    <div class="btn-group">
        <!-- ✅ FIXED -->
        <a href="view_attendance.php" class="btn">View Attendance</a>
        <a href="studentmark_view.php?id=<?= $data['student_id'] ?>" class="btn">View Marks</a>
        <a href="index.php" class="btn.logout">⭕Logout</a>
    </div>
</div>