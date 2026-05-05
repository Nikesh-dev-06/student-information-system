📘 Student Information System

A web-based Student Information System built using PHP, MySQL (XAMPP), HTML, and CSS.
It provides role-based access for Students and Teachers to manage academic data like attendance and marks.

🚀 Features

👨‍🎓 Student
Secure login (role-based)
View profile (name, roll no, department, email)
View attendance percentage
View subject-wise marks + total
Logout

👨‍🏫 Teacher
Secure login (role-based)
View all students
Add / Edit / Delete student records
Mark attendance (date-wise with checkbox)
Add / Update marks (5 subjects)
View individual student marks
Logout

📊 Subjects
Full Stack Development
DAA
DBMS
Java
Operating Systems

🧱 Tech Stack
Frontend: HTML, CSS
Backend: PHP
Database: MySQL (XAMPP)
Version Control: Git & GitHub

🗄️ Database Schema

1) users
id (PK)
username
password
role (student / teacher)
2) students
student_id (PK)
user_id (FK → users.id)
name
roll_no
dept
email
3) marks
student_id (FK → students.student_id)
subject
marks
4) attendance
student_id (FK → students.student_id)
date
status (Present / Absent)
🔗 DBMS Concepts Used
Primary Key
Foreign Key
JOIN (INNER JOIN)
Constraints (NOT NULL, UNIQUE)
CRUD Operations (Insert, Update, Delete)
Referential Integrity
🔁 Cascade Update (Academic Demo)

This project demonstrates automatic propagation of primary key updates using:

FOREIGN KEY (student_id)
REFERENCES students(student_id)
ON UPDATE CASCADE
ON DELETE CASCADE;
✅ What it shows
When students.student_id is updated
Related rows in marks and attendance update automatically

🧪 Demo Steps
-- Before
SELECT * FROM students;
SELECT * FROM marks;
SELECT * FROM attendance;

-- Update PK
UPDATE students SET student_id = 500 WHERE student_id = 3;

-- After (auto-updated in child tables)
SELECT * FROM marks;
SELECT * FROM attendance;
⚙️ Installation & Setup
1) Install XAMPP

Start:

Apache
MySQL
2) Place Project

Copy folder to:

C:\xampp\htdocs\student_system
3) Create Database
Open phpMyAdmin
Create DB: student_system
Import your .sql file
4) Run Project

Open:

http://localhost/student_system/
🔐 Sample Login

Teacher

Username: teacher
Password: 123

Student

Username: student
Password: 123

(You can modify via database)

🧪 Testing Checklist
Login authentication ✔
Role-based redirection ✔
CRUD operations ✔
Attendance (date-wise) ✔
Marks (add/update/view) ✔
Cascade update demo ✔
📈 Future Enhancements
Profile image upload
Password hashing (security)
Search & filter students
PDF report generation
Charts/analytics dashboard
Responsive UI framework
🧠 Learning Outcomes
Practical DBMS implementation
PHP–MySQL integration
Session handling
Real-world CRUD workflows
Referential integrity with ON UPDATE CASCADE
📌 Conclusion

The system provides a centralized, secure, and efficient way to manage student data, attendance, and marks with proper database design and role-based access.

👨‍💻 Author

Nikesh Babu S
B.E Computer Science and Design

📄 License
This project is for academic purposes only.
