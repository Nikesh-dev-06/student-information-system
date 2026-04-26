<!DOCTYPE html>
<html>
<head>
    <title>Student Information System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="home-bg">

<div class="overlay">

    <h1 class="title">Student Information System</h1>

    <div class="card-container">

        <!-- STUDENT CARD -->
        <div class="home-card" onclick="goLogin('student')">
            <img src="images/student.jpg" alt="Student">
            <h3>Student Login</h3>
        </div>

        <!-- TEACHER CARD -->
        <div class="home-card" onclick="goLogin('teacher')">
            <img src="images/teacher.jpg" alt="Teacher">
            <h3>Teacher Login</h3>
        </div>

    </div>

</div>

<script>
function goLogin(role) {
    window.location.href = "login.php?role=" + role;
}
</script>

</body>
</html>