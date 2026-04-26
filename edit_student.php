<?php
include "db.php";

$id = $_GET['id'];

// FETCH EXISTING DATA
$data = $conn->query("SELECT * FROM students WHERE student_id=$id")->fetch_assoc();

// UPDATE (SAFE)
if ($_POST) {

    $name = $_POST['name'];
    $roll = $_POST['roll_no'];
    $dept = $_POST['dept'];
    $email = $_POST['email'];

    $query = "UPDATE students SET 
                name='$name',
                roll_no='$roll',
                dept='$dept',
                email='$email'
              WHERE student_id='$id'";

    if ($conn->query($query)) {
        echo "<script>alert('Student Updated Successfully'); 
              window.location='view_students.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="card">
<h2>Edit Student</h2>

<form method="POST">

    <!-- Student ID (Readonly) -->
    <label>Student ID</label>
    <input value="<?= $data['student_id'] ?>" readonly>

    <!-- User ID (Readonly)
    <label>User ID</label>
    <input value="<?= $data['user_id'] ?>" readonly> -->

    <!-- Name -->
    <label>Name</label>
    <input name="name" value="<?= $data['name'] ?>" required>

    <!-- Roll No -->
    <label>Roll No</label>
    <input name="roll_no" value="<?= $data['roll_no'] ?>" required>

    <!-- Department -->
    <label>Department</label>
    <input name="dept" value="<?= $data['dept'] ?>" required>

    <!-- Email -->
    <label>Email</label>
    <input name="email" type="email" value="<?= $data['email'] ?>" required>

    <br><br>
    <button type="submit">Update</button>

</form>

<br>
<a href="view_students.php" class="btn">⬅️ Back</a>
</div>