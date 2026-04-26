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

// Fetch attendance
$res = $conn->query("
    SELECT date, status 
    FROM attendance 
    WHERE student_id = $student_id
    ORDER BY date DESC
");
?>

<link rel="stylesheet" href="style.css">

<div class="card">
    <h2>Day-wise Attendance</h2>

    <p><b>Name:</b> <?= $name ?></p>

    <table>
        <tr>
            <th>Date</th>
            <th>Status</th>
        </tr>

        <?php while($row = $res->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['date'] ?></td>
            <td style="color: <?= $row['status']=='Present' ? 'green' : 'red' ?>">
                <?= $row['status'] ?>
            </td>
        </tr>
        <?php } ?>

    </table>

    <br>
    <a href="view_attendance.php" class="btn">⬅️ Back</a>
</div>