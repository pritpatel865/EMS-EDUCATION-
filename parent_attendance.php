<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance - Efficient Management System</title>
    <link rel="stylesheet" href="dashboard.css">

    <!-- Google Font for Better Aesthetics -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar .user-info {
            display: flex;
            align-items: center;
        }

        .navbar .user-info img {
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }

        /* Attendance Section Styles */
        .attendance-section {
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .attendance-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .attendance-header h2 {
            font-size: 24px;
            color: #333;
        }

        .attendance-header .ask-leave-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .attendance-header .ask-leave-btn:hover {
            background-color: #0056b3;
        }

        .attendance-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .attendance-table th, .attendance-table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .attendance-table th {
            background-color: #f4f4f4;
        }

        .attendance-table .view-details-btn {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .attendance-table .view-details-btn:hover {
            background-color: #0056b3;
        }

        /* Floating Modal for Attendance Details */
        .details-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 500px;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
        }

        @media (max-width: 500px) {
            .details-modal {
            width: 80%;
            }
        }

        .details-modal.active {
            display: block;
        }

        .details-modal h3 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
        }

        .details-modal table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-modal table th, .details-modal table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .modal-overlay.active {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            font-weight: 600;
        }

        /* Button */
        button {
            padding: 8px 12px;
            background-color: #0275d8;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #025aa5;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Center horizontally and vertically */
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            z-index: 1001;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 500px;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal.active {
            display: block;
        }

        /* Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1000;
        }

        .overlay.active {
            display: block;
        }

        /* Modal Table */
        #modal-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        #modal-table th, #modal-table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        #modal-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <?php
            // Database connection
            $mysqli = new mysqli("localhost", "root", "", "ems", 3332);
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            // Replace with session/user login later
            $rollno = '221240107001';

            // Fetch attendance records
            $sql = "SELECT subject, date, status FROM attendance WHERE rollno = '$rollno'";
            $result = $mysqli->query($sql);

            // Group data by subject
            $attendanceData = [];
            while ($row = $result->fetch_assoc()) {
                $attendanceData[$row['subject']][] = [
                    'date' => $row['date'],
                    'status' => $row['status']
                ];
            }
            $mysqli->close();
    ?>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="logo.png" alt="Institute Logo">
            <h2>Parent Dashboard</h2>
        </div>
        <div class="user-info">
            <span>Welcome, Parent-Name</span>
            <img src="img/download.png" alt="User Profile Image" class="user-avatar">
        </div>
    </div>

    <!-- Student Details Section -->
    <div class="dashboard-header">
        <div class="student-info">
            <h2>Student Name</h2>
            <p><strong>Student Id:</strong> 0000000000</p>
            <p><strong>Enrollment / Registration Id:</strong> 00000000000000</p>
        </div>
        <div class="course-info">
            <p>SARDAR PATEL CAMPUS OF Engineering (SPEC)</p>
            <p>BACHELOR OF Information Technology</p>
            <p>Semester 5</p>
        </div>
        <img src="img/download.png" alt="Student Photo" class="profile-image">
    </div>

    <!-- Attendance Section -->
    <div class="attendance-section">
        <div class="attendance-header">
            <h2>Attendance Report</h2>
            <button class="ask-leave-btn" style="background-color: #28a745;">Contact Faculty</button>
        </div>
        <table>
            <tr><th>Subject</th><th>Attendance %</th><th>Details</th></tr>
            <?php foreach ($attendanceData as $subject => $records): 
                $total = count($records);
                $present = count(array_filter($records, fn($r) => $r['status'] === '1'));
                $percentage = round(($present / $total) * 100, 2);
            ?>
            <tr>
                <td><?= htmlspecialchars($subject) ?></td>
                <td><?= $percentage ?>%</td>
                <td><button onclick="showDetails('<?= htmlspecialchars($subject) ?>')">View</button></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Modal -->
        <div class="overlay" id="overlay" onclick="closeModal()"></div>
        <div class="modal" id="modal">
            <h3 id="modal-title">Details</h3>
            <table id="modal-table">
                <tr><th>Date</th><th>Status</th></tr>
            </table>
        </div>

        <script>
        // PHP -> JS object
        const attendanceData = <?= json_encode($attendanceData) ?>;

        function showDetails(subject) {
            const modal = document.getElementById('modal');
            const overlay = document.getElementById('overlay');
            const title = document.getElementById('modal-title');
            const table = document.getElementById('modal-table');

            title.innerText = "Details for " + subject;
            table.innerHTML = "<tr><th>Date</th><th>Status</th></tr>";

            attendanceData[subject].forEach(record => {
                const row = document.createElement("tr");
                row.innerHTML = `<td>${record.date}</td><td>${record.status === '1' ? 'Present' : 'Absent'}</td>`;
                table.appendChild(row);
            });

            modal.classList.add('active');
            overlay.classList.add('active');
        }

        function closeModal() {
            document.getElementById('modal').classList.remove('active');
            document.getElementById('overlay').classList.remove('active');
        }
    </script>
</body>
</html>