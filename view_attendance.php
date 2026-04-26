<?php
session_start();
include "db.php";

// Check login
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'student') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

// Get student_id
$stu = $conn->query("SELECT student_id, name FROM students WHERE user_id=$user_id")->fetch_assoc();

$student_id = $stu['student_id'];
$name = $stu['name'];

// Calculate attendance
$query = "
SELECT 
    COUNT(*) AS total_days,
    SUM(CASE WHEN status='Present' THEN 1 ELSE 0 END) AS present_days
FROM attendance
WHERE student_id = $student_id
";

$result = $conn->query($query);
$data = $result->fetch_assoc();

$total = $data['total_days'];
$present = $data['present_days'];

// Avoid division error
$percentage = ($total > 0) ? ($present / $total) * 100 : 0;
?>

<link rel="stylesheet" href="style.css">

<div class="card">
    <h2>Attendance Details</h2>

    <p><b>Name:</b> <?= $name ?></p>

    <p>Total Classes: <?= $total ?></p>
    <p>Classes Attended: <?= $present ?></p>

    <h3>Attendance Percentage</h3>

    <div style="background:#28a745;color:white;padding:15px;border-radius:10px;text-align:center;font-size:22px;">
        <?= round($percentage,2) ?>%
    </div>
    <a href="daywise_attendance.php" class="btn">Day-wise Attendance</a>
    <br>

    <a href="student_dashboard.php">⬅️ Back to Dashboard</a>
</div>