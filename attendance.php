<?php
include "db.php";

// SAVE ATTENDANCE
if ($_POST) {

    $date = $_POST['date'];
    $present_students = isset($_POST['present']) ? $_POST['present'] : [];

    // Get all students
    $all_students = $conn->query("SELECT student_id FROM students");

    while($row = $all_students->fetch_assoc()) {
        $id = $row['student_id'];

        // Check if student is present
        $status = in_array($id, $present_students) ? 'Present' : 'Absent';

        // Insert attendance
        $conn->query("INSERT INTO attendance(student_id, date, status)
                      VALUES('$id', '$date', '$status')");
    }

    echo "<script>alert('Attendance Saved Successfully');</script>";
}

// FETCH STUDENTS
$res = $conn->query("SELECT * FROM students");
?>

<link rel="stylesheet" href="style.css">

<div class="card">
<h2>Mark Attendance</h2>

<form method="POST">

<!-- DATE PICKER -->
<label>Select Date:</label>
<input type="date" name="date" required>

<br><br>

<!-- TABLE -->
<table>
<tr>
    <th>Name</th>
    <th>Roll No</th>
    <th>Present</th>
    <!-- <th> </th> -->
</tr>

<?php while($row = $res->fetch_assoc()) { ?>
<tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['roll_no'] ?></td>
    <td>
        <input type="checkbox" name="present[]" value="<?= $row['student_id'] ?>">
    </td>
    <!-- <td><a href="view_attendance.php">view</a> -->
</tr>
<?php } ?>

</table>

<br>

<button type="submit">Save Attendance</button>

</form>

<br>
<a href="teacher_dashboard.php">⬅️ Back</a>

</div>