<?php
include "db.php";

if ($_POST) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $dept = $_POST['dept'];
    $email = $_POST['email'];

    $conn->query("INSERT INTO students(name, roll_no, dept, email)
                  VALUES('$name','$roll','$dept','$email')");
}
?>

<link rel="stylesheet" href="style.css">

<form method="POST" class="card">
<h2>Add Student</h2>
<input name="name" placeholder="Name">
<input name="roll" placeholder="Roll">
<input name="dept" placeholder="Dept">
<input name="email" placeholder="Email">
<button>Add</button>
<a href="teacher_dashboard.php">⬅️ Back</a> 
</form>