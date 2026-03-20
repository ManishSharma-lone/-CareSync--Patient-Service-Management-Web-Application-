<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Doctor | CareSync</title>

    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="../styles/add_doctor.css">

</head>

<body>

    <div class="container main-container d-flex align-items-center justify-content-center">

        <div class="card doctor-card shadow-lg">

            <!-- Header -->
            <div class="doctor-header d-flex align-items-center gap-3">

                <div class="icon-circle">
                    <img src="../icons/medical-staff.png" class="mx-auto mb-3" width="50">
                </div>

                <div class="add">
                    <h3 class="mb-0">Add New Doctor</h3>
                    <small>Enter doctor professional details</small>
                </div>

            </div>

            <!-- Body -->
            <div class="card-body p-4">

                <form method="post" onsubmit="return validateForm()">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="" name="name" id="name">
                            <span id="nameError" class="text-danger"></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select" name="department" id="department">
                                <option value="">Select Department</option>
                                <option value="Cardiology">Cardiology</option>
                                <option value="Neurology">Neurology</option>
                                <option value="Orthopedics">Orthopedics</option>
                                <option value="Gynecology">Gynecology</option>
                                <option value="Pediatrics">Pediatrics</option>
                                <option value="General Medicine">General Medicine</option>
                            </select>
                            <span id="departmentError" class="text-danger"></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Specialization</label>
                            <input type="text" class="form-control" placeholder="" name="specialization"
                                id="specialization">
                            <span id="specializationError" class="text-danger"></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Experience (Years)</label>
                            <input type="number" class="form-control" placeholder="0" name="experience" id="experience">
                            <span id="experienceError" class="text-danger"></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" placeholder="" name="contact" id="contact">
                            <span id="contactError" class="text-danger"></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="" name="email" id="email">
                            <span id="emailError" class="text-danger"></span>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label">Create Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span id="passwordError" class="text-danger"></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword" id="confirmPassword">
                            <span id="confirmPasswordError" class="text-danger"></span>
                        </div>

                    </div>

                    <div class="text-center mt-4">
                        <input class="add-btn" type="submit" value="Add Doctor">
                    </div>

                </form>

            </div>

            <!-- Footer -->
            <div class="card-footer footer-text">
                CareSync Admin Panel • Secure Doctor Registration
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        require_once "../dbconnect.php";

        $success = false;
        $name = $_POST['name'];
        $department = $_POST['department'];
        $specialization = $_POST['specialization'];
        $experience = (int) $_POST['experience'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmpassword'];

        if ($password != $confirmPassword) {
            echo "<script>alert('Passwords do not match');</script>";
            exit();
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Check if email exists
        $checkEmail = $conn->prepare("SELECT id FROM doctors WHERE email=?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $resultEmail = $checkEmail->get_result();
        if ($resultEmail->num_rows > 0) {
            echo "<script>alert('Email already registered');</script>";
            exit();
        }

        // Start transaction
        $conn->begin_transaction();

        try {
            // Insert into doctors
            $qry = "INSERT INTO doctors(full_name, department, specialization, experience, contact, email, password)
                VALUES(?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($qry);
            $stmt->bind_param("sssisss", $name, $department, $specialization, $experience, $contact, $email, $passwordHash);
            $stmt->execute();
            $last_id = $conn->insert_id;

            // Generate doctor code
            $year = date("Y");
            $doctor_code = "DOC-" . $year . "-" . str_pad($last_id, 3, "0", STR_PAD_LEFT);

            $update = $conn->prepare("UPDATE doctors SET doctor_code=? WHERE id=?");
            $update->bind_param("si", $doctor_code, $last_id);
            $update->execute();

            // Insert into users table
            $role = "doctor";
            $userQry = "INSERT INTO users(name,email,password,role,doctor_code) VALUES(?,?,?,?,?)";
            $userStmt = $conn->prepare($userQry);
            $userStmt->bind_param("sssss", $name, $email, $passwordHash, $role, $doctor_code);
            $userStmt->execute();

            // Insert into activity_logs
            $activity = "New Doctor Added";
            $user = "Admin";
            $logQuery = "INSERT INTO activity_logs (activity, user) VALUES (?, ?)";
            $stmtLog = $conn->prepare($logQuery);
            $stmtLog->bind_param("ss", $activity, $user);
            $stmtLog->execute();

            // Commit transaction
            $conn->commit();

            // Send mail
            include "../doctor_mail.php";
            sendDoctorMail($email, $name, $doctor_code, $specialization);

            echo "<script> document.addEventListener('DOMContentLoaded', function(){
              var myModal = new bootstrap.Modal(document.getElementById('successModal'));
              myModal.show();});</script>";

        } catch (Exception $e) {
            // Rollback on any error
            $conn->rollback();
            echo "<script>alert('Error registering doctor: " . $e->getMessage() . "');</script>";
        }

        $conn->close();
    }
    ?>
    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content success-modal text-center">

                <div class="modal-body">

                    <div class="success-icon">✔</div>

                    <h4 class="success-title">Success</h4>

                    <p class="success-text">
                        Doctor Added Successfully.
                    </p>

                    <button class="btn ok-btn mt-2" data-bs-dismiss="modal">
                        OK
                    </button>

                </div>

            </div>
        </div>
    </div>

    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/add_doctor.js"></script>
    <?php if (isset($success) && $success) { ?>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                setTimeout(function () {
                    window.location.href = "admin_dashboard.php";
                }, 2000);

            });
        </script>
    <?php } ?>
</body>

</html>