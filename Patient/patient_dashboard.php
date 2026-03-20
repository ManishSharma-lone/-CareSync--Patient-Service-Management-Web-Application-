<?php
include '../dbconnect.php';
session_start();

// Replace later with session
$patient_id = 2;

// Fetch latest appointments
$query = "SELECT a.*, d.full_name, d.department 
          FROM appointments a
          JOIN doctors d ON a.doctor_id = d.id
          WHERE a.patient_id = '$patient_id'
          ORDER BY a.appointment_date DESC, a.appointment_time DESC
          LIMIT 5";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard - CareSync</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styling -->
    <style>
        body {
            background: #f4f7fb;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #4a7cf3, #2d62d8);
            color: white;
            border-radius: 15px;
            padding: 25px;
        }

        .card-box {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }

        .card-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .quick-btn {
            border-radius: 12px;
            padding: 12px;
            font-weight: 500;
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 15px;
        }

        table {
            border-radius: 10px;
            overflow: hidden;
        }

        footer {
            border-top: 1px solid #ddd;
        }
    </style>

</head>

<body>

<?php include 'patient_nav.php'; ?>

<div class="container mt-4">

    <!-- 🔵 HEADER -->
    <div class="dashboard-header glass-header mb-4">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <h3 class="fw-bold mb-1">Welcome back 👋</h3>
            <p class="mb-0">Track your appointments and manage your health easily.</p>
        </div>
        <div>
           
        </div>
    </div>
</div>

    <!-- 🟢 STATS -->
    <div class="row g-4">

        <div class="col-6 col-md-3">
            <div class="card card-box text-center p-3 bg-primary text-white">
                <h6>Upcoming</h6>
                <h3>2</h3>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card card-box text-center p-3 bg-success text-white">
                <h6>Completed</h6>
                <h3>5</h3>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card card-box text-center p-3 bg-warning text-dark">
                <h6>Reports</h6>
                <h3>3</h3>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card card-box text-center p-3 bg-danger text-white">
                <h6>Alerts</h6>
                <h3>2</h3>
            </div>
        </div>

    </div>

    <!-- 🟣 QUICK ACTIONS -->
    <div class="mt-5">
        <h5 class="section-title">Quick Actions</h5>

        <div class="row g-3">

            <div class="col-6 col-md-3">
                <a href="book_appointment.php" class="btn btn-primary w-100 quick-btn">
                    📅 Book Appointment
                </a>
            </div>

            <div class="col-6 col-md-3">
                <a href="my_appointments.php" class="btn btn-success w-100 quick-btn">
                    📋 My Appointments
                </a>
            </div>

            <div class="col-6 col-md-3">
                <a href="medical_records.php" class="btn btn-warning w-100 quick-btn">
                    🧾 Medical Records
                </a>
            </div>

            <div class="col-6 col-md-3">
                <a href="profile.php" class="btn btn-dark w-100 quick-btn">
                    👤 Profile
                </a>
            </div>

        </div>
    </div>

    <!-- 🔵 RECENT APPOINTMENTS -->
    <div class="mt-5">
        <h5 class="section-title">Recent Appointments</h5>

        <div class="table-responsive shadow-sm">
            <table class="table table-hover text-center align-middle bg-white">

                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Doctor</th>
                        <th>Department</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php if($result->num_rows > 0) { ?>
                    <?php while($row = $result->fetch_assoc()) { ?>

                    <tr>
                        <td><?= date("d M Y", strtotime($row['appointment_date'])) ?></td>

                        <td>Dr <?= $row['full_name'] ?></td>

                        <td><?= $row['department'] ?></td>

                        <td><?= date("h:i A", strtotime($row['appointment_time'])) ?></td>

                        <td>
                            <?php if($row['status'] == 'Pending') { ?>
                                <span class="badge bg-warning text-dark">Pending</span>
                            <?php } elseif($row['status'] == 'Completed') { ?>
                                <span class="badge bg-success">Completed</span>
                            <?php } else { ?>
                                <span class="badge bg-danger">Cancelled</span>
                            <?php } ?>
                        </td>

                        <td>
                            <a href="my_appointments.php" class="btn btn-sm btn-outline-primary">
                                View
                            </a>
                        </td>
                    </tr>

                    <?php } ?>
                <?php } else { ?>

                    <tr>
                        <td colspan="6">No Appointments Found</td>
                    </tr>

                <?php } ?>

                </tbody>

            </table>
        </div>

    </div>

</div>

<!-- Footer -->
<footer class="text-center mt-5 p-3 bg-white">
    © 2026 CareSync | Patient Portal
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>