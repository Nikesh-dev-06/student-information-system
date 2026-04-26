<?php
include "db.php";

$res = $conn->query("SELECT * FROM students");
?>

<link rel="stylesheet" href="style.css">

<div class="card">
<h2>Students</h2>

<table>
<tr>
    <th>Name</th>
    <th>Roll</th>
    <th>Dept</th>
    <th>Action</th>
</tr>

<?php while($row = $res->fetch_assoc()) { ?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['roll_no'] ?></td>
<td><?= $row['dept'] ?></td>
<td>
    <!-- ✅ NEW EDIT BUTTON -->
    <a class="btn edit" href="edit_student.php?id=<?= $row['student_id'] ?>">Edit</a>

    <!-- DELETE BUTTON -->
    <a class="btn logout" href="?delete=<?= $row['student_id'] ?>" 
       onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php } ?>

</table>

<a href="teacher_dashboard.php" class="btn">⬅️ Back</a>
</div>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE student_id=$id");
    header("Location: view_students.php");
}
?>