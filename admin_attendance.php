<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Attendance</title>
  <link rel="stylesheet" href="dashboard.css"/>
  <style>
    .attendance-filters {
        display: flex;
        /* flex-wrap: wrap; */
        justify-content: space-between;
        margin: 20px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        overflow-x: auto;
    }

    .filter-group {
        display: flex;
        align-items: center;
        margin: 0 10px;
        /* flex: 1 1 250px;
        min-width: 220px; */
    }

    .filter-group label {
        font-weight: 600;
        white-space: nowrap;
    }

    .attendance-filters select, .attendance-filters input[type="date"] {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .attendance-table {
      margin: 20px;
      background: white;
      border-radius: 10px;
      overflow-x: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table thead {
      background-color: #0073e6;
      color: white;
    }

    table th, table td {
      padding: 12px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    .status-present {
      color: green;
    }

    .status-absent {
      color: red;
    }

    .status-late {
      color: orange;
    }
    .attendance-filters {
        display: flex;
        justify-content: space-between;
        margin: 20px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        overflow-x: auto;
    }
    .filter-group {
        display: flex;
        align-items: center;
        margin: 0 10px;
    }
    .filter-group label {
        font-weight: 600;
        white-space: nowrap;
    }
    .attendance-filters select {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .attendance-table {
      margin: 20px;
      background: white;
      border-radius: 10px;
      overflow-x: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table thead {
      background-color: #0073e6;
      color: white;
    }
    button {
            padding: 8px 12px;
            background-color: #0275d8;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
    }
    table th, table td {
      padding: 12px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    .status-present { color: green; }
    .status-absent { color: red; }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="logo">
      <img src="logo.png" alt="Institute Logo" />
      <h2>Admin Dashboard</h2>
    </div>
    <div class="user-info">
      <span>Welcome, Admin</span>
      <img src="img/download.png" alt="Admin Avatar" height="35" />
    </div>
  </div>
  
  <div class="dashboard-header">
    <h2>Attendance Management</h2>
    <p>View and manage student attendance records</p>
  </div>

  <form method="POST">
    <div class="attendance-filters">
      <div class="filter-group">
        <label for="department">Department:</label>
        <select name="department" id="department">
          <option value="CE">Computer Engineering</option>
          <option value="IT">Information Technology</option>
        </select>
      </div>
      <div class="filter-group">
        <label for="semester">Semester:</label>
        <select name="semester" id="semester">
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      </div>
      <div class="filter-group">
        <button type="submit" name="show">Show Attendance</button>
      </div>
    </div>
  </form>

  <div class="attendance-table">
    <table>
      <thead>
        <tr>
          <th>Roll No</th>
          <th>Subject</th>
          <?php
          if (isset($_POST['show'])) {
            $mysqli = new mysqli("localhost", "root", "", "ems", 3332);
            $dept = $_POST['department'];
            $sem = $_POST['semester'];
            $dates = [];
            $res = $mysqli->query("SELECT DISTINCT date FROM attendance WHERE department='$dept' AND semester='$sem' ORDER BY date");
            while ($row = $res->fetch_assoc()) {
              $dates[] = $row['date'];
              echo "<th>{$row['date']}</th>";
            }
            echo "</tr></thead><tbody>";

            $students = $mysqli->query("SELECT DISTINCT rollno FROM attendance WHERE department='$dept' AND semester='$sem' ORDER BY rollno");
            while ($stu = $students->fetch_assoc()) {
              $rollno = $stu['rollno'];
              $subjectRes = $mysqli->query("SELECT DISTINCT subject FROM attendance WHERE rollno='$rollno'");
              while ($sub = $subjectRes->fetch_assoc()) {
                $subject = $sub['subject'];
                echo "<tr><td>$rollno</td><td>$subject</td>";
                foreach ($dates as $d) {
                  $q = "SELECT status FROM attendance WHERE rollno='$rollno' AND subject='$subject' AND date='$d' LIMIT 1";
                  $r = $mysqli->query($q);
                  if ($r && $r->num_rows > 0) {
                    $status = $r->fetch_assoc()['status'];
                    $symbol = $status == '1' ? 'P' : 'A';
                    $class = $status == '1' ? 'status-present' : 'status-absent';
                    echo "<td class='$class'>$symbol</td>";
                  } else {
                    echo "<td>-</td>";
                  }
                }
                echo "</tr>";
              }
            }
            $mysqli->close();
          }
          ?>
        </tr>
      </thead>
    </table>
  </div>
</body>
</html>
