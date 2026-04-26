<?php
include "db.php";

$id = $_GET['id'];

// ✅ Fetch student name
$student = $conn->query("SELECT name FROM students WHERE student_id=$id")->fetch_assoc();

// Fixed subject list
$subjects = [
    "Full Stack Development",
    "DAA",
    "DBMS",
    "Java",
    "OS"
];

// ================= UPDATE =================
if ($_POST) {

    foreach ($subjects as $sub) {

        $marks = $_POST['marks'][$sub];

        // Check if subject exists
        $check = $conn->query("SELECT * FROM marks 
                               WHERE student_id='$id' AND subject='$sub'");

        if ($check->num_rows > 0) {
            // UPDATE
            $conn->query("UPDATE marks 
                          SET marks='$marks' 
                          WHERE student_id='$id' AND subject='$sub'");
        } else {
            // INSERT if missing
            $conn->query("INSERT INTO marks(student_id, subject, marks)
                          VALUES('$id', '$sub', '$marks')");
        }
    }

    echo "<script>alert('Marks Updated Successfully');</script>";
}

// ================= FETCH =================
$res = $conn->query("SELECT subject, marks FROM marks WHERE student_id=$id");

$data = [];
while ($row = $res->fetch_assoc()) {
    $data[$row['subject']] = $row['marks'];
}
?>

<link rel="stylesheet" href="style.css">

<div class="card">
<h2>Edit Marks</h2>

<!-- ✅ Student Name -->
<h3><?= $student['name'] ?></h3>

<form method="POST">

<table>
<tr>
    <th>Subject</th>
    <th>Marks</th>
</tr>

<?php foreach ($subjects as $sub) { 
    $mark = isset($data[$sub]) ? $data[$sub] : 0;
?>
<tr>
    <td><?= $sub ?></td>
    <td>
        <input type="number" name="marks[<?= $sub ?>]" value="<?= $mark ?>">
    </td>
</tr>
<?php } ?>

</table>

<br>
<button type="submit">Update All</button>

</form>

<br>
<a href="marks.php" class="btn">⬅️ Back</a>
</div>