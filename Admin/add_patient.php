<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CareSync - Add Patient</title>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/add_patient.css">
</head>

<body class="patient-bg">
    <div class="container mt-5 mb-5">
        <div class="card patient-card border-0">
            <div class="patient-header d-flex align-items-center gap-3">
                <div class="icon-circle">
                    <img src="../icons/crowd.png" class="mx-auto mb-3" width="50">
                </div>
                <div class="add">
                    <h3 class="mb-0">Add New Patient</h3>
                    <small>Secure Patient Registration</small>
                </div>
            </div>
            <div class="card-body p-4">
                <form id="patientForm" onsubmit="return validateForm()" method="post" action="add_patient.php">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Patient Full Name</label>
                            <input type="text" id="name" class="form-control custom-input" placeholder="Enter full name"
                                name="name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" id="email" class="form-control custom-input" placeholder="Enter email"
                                name="email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="tel" id="mobile" class="form-control custom-input"
                                placeholder="Enter mobile number" name="mobile">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" id="dob" class="form-control custom-input" name="dob">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label d-block">Gender</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="male">
                                <label class="form-check-label">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="female">
                                <label class="form-check-label">Female</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Other">
                                <label class="form-check-label">Other</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Aadhar ID</label>
                            <input type="text" class="form-control custom-input" placeholder="Enter Aadhar number"
                                name="aadhar">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Blood Group</label>

                            <select class="form-select custom-input" name="blood">
                                <option>Select Blood Group</option>
                                <option>A+</option>
                                <option>B+</option>
                                <option>AB+</option>
                                <option>O+</option>
                                <option>A-</option>
                                <option>AB-</option>
                                <option>O-</option>
                            </select>

                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control custom-input" placeholder="Enter city" name="city">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control custom-input" rows="2" name="address"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Create Password</label>
                            <input type="password" class="form-control custom-input" name="password">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control custom-input" name="confirmpassword">
                        </div>

                    </div>

                    <div class="text-center mt-4">
                        <input type="submit" class="btn register-btn" value="Register Patient">
                    </div>

                </form>

            </div>

            <div class="card-footer text-center footer-text">
                After registration, login details can be shared securely with the patient
            </div>

        </div>
    </div>


    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        require_once "../dbconnect.php";
        $success = false;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $aadhar = $_POST['aadhar'];
        $blood = $_POST['blood'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmpassword'];

        if ($password != $confirmPassword) {
            echo "<script>alert('Passwords do not match');</script>";
            exit();
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        /* CHECK EMAIL */

        $checkEmail = $conn->prepare("SELECT id FROM users WHERE email=?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $resultEmail = $checkEmail->get_result();

        if ($resultEmail->num_rows > 0) {

            echo "<script>alert('Email already registered');</script>";

        } else {

            /* STEP 1: INSERT PATIENT FIRST */

            $qry = "INSERT INTO patients(full_name,email,mobile,dob,gender,aadhar,blood_group,city,address,password)
        VALUES(?,?,?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($qry);

            $stmt->bind_param(
                "ssssssssss",
                $name,
                $email,
                $mobile,
                $dob,
                $gender,
                $aadhar,
                $blood,
                $city,
                $address,
                $passwordHash
            );

            $res = $stmt->execute();
            if ($res) {
                $last_id = $conn->insert_id;
                $success = true;
                /* STEP 3: GENERATE PATIENT CODE */

                $year = date("Y");
                $patient_code = "PAT-" . $year . "-" . str_pad($last_id, 3, "0", STR_PAD_LEFT);

                /* STEP 4: UPDATE PATIENT CODE */

                $update = $conn->prepare("UPDATE patients SET patient_code=? WHERE id=?");
                $update->bind_param("si", $patient_code, $last_id);
                $update->execute();

                /* INSERT USER */

                $role = "patient";

                $userQry = "INSERT INTO users(name,email,password,role,patient_code)
            VALUES(?,?,?,?,?)";

                $userStmt = $conn->prepare($userQry);

                $userStmt->bind_param(
                    "sssss",
                    $name,
                    $email,
                    $passwordHash,
                    $role,
                    $patient_code
                );

                $userStmt->execute();
                // $patient_name = $name;
                // $patient_email = $email;
                // $patient_id = $patient_code;
    
                $activity = "New Patient Registered";
                $user = "Admin";

                $logQuery = "INSERT INTO activity_logs (activity, user) VALUES (?, ?)";
                $stmt = $conn->prepare($logQuery);
                $stmt->bind_param("ss", $activity, $user);
                $stmt->execute();

                include "../php_mail.php";
                sendPatientMail($email, $name, $patient_code);
                echo "<script>
            document.addEventListener('DOMContentLoaded', function(){
            var myModal=new bootstrap.Modal(document.getElementById('successModal'));
            myModal.show();
            });
            </script>";

            }
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
                        Patient registered successfully.
                    </p>

                    <button class="btn ok-btn mt-2" data-bs-dismiss="modal">
                        OK
                    </button>

                </div>

            </div>
        </div>
    </div>

    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/add_patient.js"></script>
    <?php if (isset($success) && $success) { ?>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                setTimeout(function () {
                    window.location.href = "../home.php";
                }, 2000);

            });
        </script>
    <?php } ?>
</body>

</html>