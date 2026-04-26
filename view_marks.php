<?php
include "db.php";

$id = $_GET['id'];

// Predefined subjects
$subjects = [
    "Full Stack Development",
    "DAA",
    "DBMS",
    "Java",
    "OS"
];

// Fetch marks
$res = $conn->query("SELECT subject, marks FROM marks WHERE student_id=$id");

$data = [];
while($row = $res->fetch_assoc()) {
    $data[$row['subject']] = $row['marks'];
}

// Calculate total
$total = 0;
?>

<link rel="stylesheet" href="style.css">

<div class="card">
<h2>Student Marks</h2>

<table>
<tr>
    <th>Subject</th>
    <th>Marks</th>
</tr>

<?php foreach($subjects as $sub) { 
    $mark = isset($data[$sub]) ? $data[$sub] : 0;
    $total += $mark;
?>
<tr>
    <td><?= $sub ?></td>
    <td><?= $mark ?></td>
</tr>
<?php } ?>

<tr>
    <th>Total</th>
    <th><?= $total ?></th>
</tr>

</table>

<br>
<a href="marks.php" class="btn">⬅️ Back</a>
</div>