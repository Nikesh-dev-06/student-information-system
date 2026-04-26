<?php
session_start();
include "db.php";

// Check login
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'teacher') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

// Fetch teacher details
$res = $conn->query("SELECT * FROM teachers WHERE user_id=$user_id");
$data = $res->fetch_assoc();
?>

<link rel="stylesheet" href="style.css">

<div class="card">
    <h2>Teachers Login</h2>

    <!-- PROFILE CARD -->
    <div style="background:#f8f9fa;padding:15px;border-radius:10px;margin-bottom:15px;">
        <h3><?= $data['name'] ?></h3>
        <p><b>Department:</b> <?= $data['dept'] ?></p>
        <p><b>Education:</b> <?= $data['education'] ?></p>
        <p><b>Designation:</b> <?= $data['designation'] ?></p>
    </div>

    <!-- ACTION BUTTONS -->
    <div class="btn-group">
    <a href="view_students.php" class="btn">View Students</a>
    <a href="add_student.php" class="btn">Add Student</a>
    <a href="attendance.php" class="btn">Manage Attendance</a>
    <a href="marks.php" class="btn">Manage Marks</a>
    <a href="index.php" class="btn.logout">⭕Logout</a>
    </div>
    
</div>