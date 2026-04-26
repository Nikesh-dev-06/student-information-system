<?php
include "db.php";

// ================= ADD / UPDATE MARK =================
if ($_POST) {
    $id = $_POST['id'];
    $sub = $_POST['sub'];
    $marks = $_POST['marks'];

    // Check if subject already exists for student
    $check = $conn->query("SELECT * FROM marks 
                           WHERE student_id='$id' AND subject='$sub'");

    if ($check && $check->num_rows > 0) {
        // UPDATE if exists
        $result = $conn->query("UPDATE marks 
                                SET marks='$marks' 
                                WHERE student_id='$id' AND subject='$sub'");

        if (!$result) {
            echo "Update Error: " . $conn->error;
        }

    } else {
        // INSERT if new
        $result = $conn->query("INSERT INTO marks(student_id,subject,marks)
                               VALUES('$id','$sub','$marks')");

        if (!$result) {
            echo "Insert Error: " . $conn->error;
        }
    }

    echo "<script>alert('Marks Saved Successfully');</script>";
}

// FETCH STUDENTS
$res = $conn->query("SELECT * FROM students");
?>

<link rel="stylesheet" href="style.css">

<div class="card">
<h2>Student Marks Management</h2>

<!-- ================= ADD MARK FORM ================= -->
<form method="POST" style="margin-bottom:15px;">
    
    <select name="id" required>
        <option value="">Select Student</option>
        <?php
        $students = $conn->query("SELECT * FROM students");
        while($s = $students->fetch_assoc()) {
            echo "<option value='{$s['student_id']}'>{$s['name']} ({$s['roll_no']})</option>";
        }
        ?>
    </select>

    <select name="sub" required>
        <option value="">Select Subject</option>
        <option value="Full Stack Development">Full Stack Development</option>
        <option value="DAA">DAA</option>
        <option value="DBMS">DBMS</option>
        <option value="Java">Java</option>
        <option value="OS">OS</option>
    </select>

    <input name="marks" type="number" placeholder="Marks" required>

    <button type="submit">Add / Update Marks</button>
</form>

<!-- ================= STUDENT LIST ================= -->
<table>
<tr>
    <th>Name</th>
    <th>Roll</th>
    <th>Actions</th>
</tr>

<?php while($row = $res->fetch_assoc()) { ?>
<tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['roll_no'] ?></td>
    <td>
        <a class="btn" href="view_marks.php?id=<?= $row['student_id'] ?>">🗒️View</a>
        <a class="btn edit" href="edit_marks.php?id=<?= $row['student_id'] ?>">📝Edit</a>
    </td>
</tr>
<?php } ?>

</table>

<br>
<a href="teacher_dashboard.php" class="btn">⬅️ Back</a>
</div>