<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attandance</title>
    <link rel="stylesheet" href="dashboard.css">

    <style>
        @media (max-width: 768px) {
            .attandance_box, .outer-container {
                margin-left: 50px;
                margin-right: 50px;
            }

            
        }

        .attandance_box {
            margin: 0 auto; /* Centers the box */
            max-width: 900px;  /* Maximum width of the box */
            padding: 0 20px 20px 20px;  /* Optional padding for inner space */
            box-sizing: border-box;  /* Ensures padding doesn't affect the width */
            margin-bottom: 70px;
            text-align: center;
        }

        .student {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            opacity: 1;
            display: flex;             /* Arrange items horizontally in a row */
            align-items: center;       /* Vertically align items */
            margin-bottom: 10px;       /* Space between rows */
        }

        /* Hover effect for student row */
        .student:hover {
            transform: scale(1.01);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        /* Individual items within the student row */
        .index {
            margin-right: 10px;
            font-weight: bold;
            text-align: left; /* Align text to the left */
        }

        .name {
            margin-left: 0;
            flex-grow: 1;
            width: 130px; /* Set a fixed width for the name column */
            text-align: left; /* Align text to the left */
        }
        .enrollment {
            flex-grow: 2;
            margin-left: 10px;
            font-weight: bold;
            width: 150px; /* Set a fixed width for the enrollment column */
            text-align: left; /* Align text to the left */
        }

        input[type="checkbox"] {
            transform: scale(1.2); /* Optional: make checkbox a little larger */
        }

        .heading {
            margin: 0 0 15px 0;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
        }

        /* Button styling */
        .submit, .submit-detail {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #0275d8;  /* Change this to your desired color */
            color: white;               /* Text color */
            border: none;               /* No border */
            border-radius: 8px;         /* Rounded corners */
            cursor: pointer;           /* Pointer cursor on hover */
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        /* Button hover effect */
        .submit:hover, .submit-detail:hover {
            background-color: #025aa5; /* Change this to a different color on hover */
            transform: scale(1.05);
        }

        .submit:active, .submit-detail:hover {
            background-color: #023f6d; 
            transform: scale(1);
        }

        .submit:focus, .submit-detail:hover {
            outline: none;    
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .outer-container {
            margin: 0 auto;
            max-width: 1500px;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {    
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        select, #dateInput {
            width: 100%;
            padding: 10px;
            background: none;
            border: 2px solid #000000;
            border-radius: 8px;
            outline: none;
            color: #000000;
            font-size: 18px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        .selection-list {
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); 
            gap: 5px;    
            margin-bottom: 10px;    
        }
    </style>

    <!-- Google Font for Better Aesthetics -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="logo">
      <img src="logo.png" alt="Institute Logo">
      <h2>Faculty Dashboard</h2>
    </div>
    <div class="user-info">
      <span>Welcome, Faculty</span>
      <img src="img/download.png" alt="User Profile Image" class="user-avatar">
    </div>
  </div>

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="faculty-info">
            <h2>John Doe</h2>
            <p><strong>Faculty Id:</strong> F-202300123</p>
            <p><strong>Department:</strong> Artificial Intelligence and Data Science</p>
        </div>
        <div class="institute-info">
            <p>SARDAR PATE  L EDUCATTION CAMPUS (SPEC)</p>
            <p>Faculty Dashboard</p>
        </div>
        <img src="img/download.png" alt="Faculty Photo" class="profile-image">
    </div>

  <!-- Form for Selection -->
  <div class="outer-container">
    <div class="container">
      <form method="POST">
        <div class="selection-list">
          <select name="department" required>
            <option disabled selected>Select Department</option>
            <option value="CE">Computer Science</option>
            <option value="IT">Information Technology</option>
          </select>
          <select name="semester" required>
            <option disabled selected>Select Semester</option>
            <option value="4">Semester 4</option>
            <option value="5">Semester 5</option>
            <option value="6">Semester 6</option>
          </select>
          <select name="subject" required>
            <option disabled selected>Select Subject</option>
            <option value="Artificial Intelligence">Artificial Intelligence</option>
            <option value="Data Structures">Data Structures</option>
            <option value="Cyber Security">Cyber Security</option>
            <option value="Machine Learning">Machine Learning</option>
            <option value="Cloud Computing">Cloud Computing</option>
          </select>
          <select name="lecture" required>
            <option disabled selected>Select Lecture</option>
            <option value="lec1">Lecture 1</option>
            <option value="lec2">Lecture 2</option>
            <option value="lec3">Lecture 3</option>
          </select>
          <input type="date" name="date" required>
        </div>
        <input class="submit-detail" type="submit" name="show" value="Show Students">
      </form>
    </div>
  </div>

  <!-- Student Attendance Box -->
  <div class="attandance_box">
    <h1 class="heading">Attendance</h1>
    <form method="POST">
      <input type="hidden" name="dept" value="<?php echo $_POST['department'] ?? ''; ?>">
      <input type="hidden" name="sem" value="<?php echo $_POST['semester'] ?? ''; ?>">
      <input type="hidden" name="sub" value="<?php echo $_POST['subject'] ?? ''; ?>">
      <input type="hidden" name="lec" value="<?php echo $_POST['lecture'] ?? ''; ?>">
      <input type="hidden" name="date" value="<?php echo $_POST['date'] ?? ''; ?>">
      <?php
        if (isset($_POST['show'])) {
          $conn = new mysqli("localhost", "root", "", "ems", 3332);
          $dept = $_POST['department'];
          $sem = $_POST['semester'];
          $sub = $_POST['subject'];
          $res = $conn->query("SELECT rollno, name FROM student WHERE depart='$dept' AND sem='$sem'");
          $i = 1;
          while ($row = $res->fetch_assoc()) {
            echo "<div class='student'>
                    <span class='index'>{$i}.</span>
                    <span class='name'>{$row['name']}</span>
                    <span class='enrollment'>{$row['rollno']}</span>
                    <input type='checkbox' name='attendance[{$row['rollno']}]' value='1'>
                  </div>";
            $i++;
          }
          $conn->close();
      ?>
      <input class="submit" type="submit" name="mark" value="Mark Attendance">
      <?php } ?>
    </form>
  </div>

  <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark'])) {
            $conn = new mysqli("localhost", "root", "", "ems", 3332);

            $department = $_POST['dept'];
            $semester = $_POST['sem'];
            $subject = $_POST['sub'];
            $lecture = $_POST['lec'];
            $date = $_POST['date'];

            // Get all students of that dept & sem
            $students = $conn->query("SELECT rollno FROM student WHERE depart='$department' AND sem='$semester'");

            if ($students->num_rows > 0) {
                while ($row = $students->fetch_assoc()) {
                    $rollno = $row['rollno'];
                    $status = isset($_POST['attendance'][$rollno]) ? '1' : '0';

                    $sql = "INSERT INTO attendance (rollno, subject, date, lecture_number, status, department, semester) 
                            VALUES ('$rollno', '$subject', '$date', '$lecture', '$status', '$department', '$semester')";
                    $conn->query($sql);
                }
                echo "<script>alert('Attendance marked successfully!');</script>";
            } else {
                echo "<script>alert('No students found for selected department and semester.');</script>";
            }

            $conn->close();
        }


  ?>
</body>
</html>