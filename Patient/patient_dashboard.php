<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care-Sync Patient Portal</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/patient_dashboard.css">

</head>

<body>

    <!-- TOP NAVIGATION -->
    <div class="top-nav d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center dash nav">
            <img src="../Assets/CareSyncLogo.png" width="45">
            <h4 class="ms-2 mb-0 fw-bold text-white">CareSync</h4>
            <h4 class="ms-4 mb-0 fw-boldtext-white"> Patient Panel</h4>
        </div>
        <div class="d-flex align-items-center gap-3">

            <div class="icon-circle">
                🔔
            </div>

            <div class="icon-circle">
                <img src="../icons/examination.png" width="18">
            </div>

            <a href="../home.php" class="btn btn-light logout-btn">
                Logout
            </a>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <!-- SIDEBAR -->
            <div class="col-md-2 sidebar">

                <a href="./search_doctor.php">🔍 Search Doctor</a>
                <a href="#">📅 My Appointments</a>
                <a href="#">💊 Prescriptions</a>
                <a href="#">🧾 Medical Reports</a>
                <a href="#">⭐ My Reviews</a>
                <a href="#">🔔 Notifications</a>
                <a href="#">🩺 Book Appointment</a>
            </div>

            <!-- MAIN CONTENT -->
            <div class="col-md-10 main-content">
                <?php
                session_start();
                require_once '../dbconnect.php';
                if (!isset($_SESSION['patient_id'])) {
                    header('location:../login.php');
                    exit();
                }

                $id = $_SESSION['patient_id'];
                $qry = "SELECT * FROM patients WHERE patient_code=?";
                $stmt = $conn->prepare($qry);
                $stmt->bind_param("s", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    echo "No patient found";
                    exit();
                }
                ?>
                <!-- Welcome -->
                <div class="section-card">
                    <h4>Welcome, <?php echo $row['full_name'] ?> <span><img src="../icons/waving-hand.png" width="30"
                                alt="Logo"></span>
                    </h4>
                    <p>Patient ID: <strong><?php echo $row['patient_code'] ?> </strong> | Blood Group:
                        <strong><?php echo $row['blood_group'] ?> </strong>
                    </p>
                </div>

                <!-- Quick Cards -->
                <div class="row mb-4">

                    <div class="col-md-3">
                        <div class="info-card card-blue">
                            Upcoming Visits
                            <h4>2 Visits</h4>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-card card-green">
                            Prescriptions
                            <h4>1 New</h4>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-card card-orange">
                            Reports
                            <h4>3 Files</h4>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-card card-red">
                            Notifications
                            <h4>2 Alerts</h4>
                        </div>
                    </div>

                </div>

                <!-- Appointments -->
                <div class="section-card">

                    <h5 class="mb-3">📅 Upcoming Appointments</h5>

                    <table class="table table-hover text-center">

                        <thead class="table-dark">
                            <tr>
                                <th>Date</th>
                                <th>Doctor</th>
                                <th>Dept</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>12 Feb</td>
                                <td>Dr Mehta</td>
                                <td>Cardiology</td>
                                <td>10:30 AM</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Reschedule</button>
                                    <button class="btn btn-danger btn-sm">Cancel</button>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                </div>

                <!-- Prescription & Reports -->
                <div class="row">

                    <div class="col-md-6">
                        <div class="section-card">
                            <h5>💊 Recent Prescription</h5>
                            <p>Dr Rao – Viral Fever – 5 Feb</p>
                            <button class="btn btn-primary btn-sm">View</button>
                            <button class="btn btn-success btn-sm">Download</button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="section-card">
                            <h5>🧾 Recent Report</h5>
                            <p>Blood Test – 3 Feb</p>
                            <button class="btn btn-primary btn-sm">View</button>
                            <button class="btn btn-success btn-sm">Download</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        © 2026 Care-Sync | Privacy Policy | Terms
    </div>
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>