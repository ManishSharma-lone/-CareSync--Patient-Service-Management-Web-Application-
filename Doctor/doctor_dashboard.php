<!DOCTYPE html>
<html>

<head>
    <title>CARE-SYNC Doctor Portal</title>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/doctor_dashboard.css">
</head>

<body>

<div class="container-fluid px-0">
<div class="main-content w-100"></div>
    <?php
    session_start();
    require_once '../dbconnect.php';
    if (!isset($_SESSION['doctor_id'])) {
        header('location:../login.php');
        exit();
    }

    $id = $_SESSION['doctor_id'];
    $qry = "SELECT * FROM doctors WHERE doctor_code=?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No Doctor found";
        exit();
    }
    ?>

    <!-- TOP NAVBAR -->
    <nav class="navbar navbar-expand-lg top-navbar px-4">

        <div class="container-fluid d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center dash">
                <img src="../Assets/CareSyncLogo.png" width="30" alt="Logo">
                <h4 class="ms-2 mb-0 fw-bold text-white">CareSync</h4>
                <h5 class="ms-4 mb-0 fw-bold text-white">Doctor Panel</h5>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle d-flex align-items-center justify-content-center">🔔</div>
                <div class="icon-circle d-flex align-items-center justify-content-center">
                    <img src="../icons/doctor.png" width="18" alt="Doctor">
                </div>
                <a href="../logout.php" class="btn btn-light btn-rounded logout-btn">LogOut</a>
            </div>
        </div>
    </nav>

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg menu-bar px-4">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Today's Appointments</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Patients</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Notes</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Schedule</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid section-spacing px-4">

        <!-- WELCOME PANEL -->
        <div class="card welcome-card shadow-sm p-4 mb-4">
            <div class="d-flex align-items-center mb-2">
                <h6 class="text-muted mb-0">Welcome</h6>
                <img src="../icons/waving-hand.png" width="20" height="20" class="me-3">
            </div>

            <h4 class="fw-bold mb-1 text-primary"><?php echo $row['full_name'] ?></h4>
            <p class="mb-0 text-muted">
                Specialization: <?php echo $row['specialization'] ?>
            </p>
        </div>

        <!-- QUICK STATS -->
        <div class="row mb-4">

            <div class="col-md-4">
                <div class="card stat-card shadow-sm p-4 text-center">
                    <h6>Today's Appointments</h6>
                    <div class="stat-number">8</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card shadow-sm p-4 text-center">
                    <h6>Upcoming This Week</h6>
                    <div class="stat-number">14</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card shadow-sm p-4 text-center">
                    <h6>Pending Notes</h6>
                    <div class="stat-number">2</div>
                </div>
            </div>

        </div>

        <!-- UPCOMING APPOINTMENTS -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Upcoming Appointments
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Patient Name</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>12 Feb</td>
                                <td>Ravi Kumar</td>
                                <td>10:30 AM</td>
                                <td><span class="badge bg-success">Booked</span></td>
                            </tr>

                            <tr>
                                <td>13 Feb</td>
                                <td>Anita Das</td>
                                <td>11:00 AM</td>
                                <td><span class="badge bg-success">Booked</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-primary me-2">View Today's Appointments</button>
                    <button class="btn btn-outline-primary">Update Availability</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="../Bootstrap/bootstrap.bundle.min.js"></script>

</body>
</html>