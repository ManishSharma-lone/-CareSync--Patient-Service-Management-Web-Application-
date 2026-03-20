<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "dbconnect.php";
    // Trim the input to remove spaces
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare query
    $qry = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the row
    if ($row = $result->fetch_assoc()) {

        // Trim the DB password hash to avoid hidden spaces
        $hashFromDb = trim($row['password']);

        if (password_verify($password, $hashFromDb)) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            if ($row['role'] == "admin") {
                $_SESSION['email']=$row['email'];
                header("Location: ./Admin/admin_dashboard.php");
                exit();
    
            } elseif ($row['role'] == "doctor") {

                if (empty($row['doctor_code'])) {
                    echo "<script>alert('Doctor ID missing');</script>";
                    exit();
                }
                $_SESSION['doctor_id'] = $row['doctor_code'];
                header("Location: ./Doctor/doctor_dashboard.php");
                exit();
            } elseif ($row['role'] == "patient") {
                if (empty($row['patient_code'])) {
                    echo "<script>alert('Patient ID missing');</script>";
                    exit();
                }
                $_SESSION['patient_id'] = $row['patient_code'];
                header("Location: ./Patient/patient_dashboard.php");
                exit();
            } elseif ($row['role'] == "attendee") {
                if (empty($row['attendee_code'])) {
                    echo "<script>alert('Attendee ID missing');</script>";
                    exit();
                }
                header("Location: ./Attendee/attendee_dashboard.php");
                exit();
            }

        } else {
            echo "<script>alert('Incorrect Password');</script>";
        }

    } else {
        echo "<script>alert('User not found');</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CareSync - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>

    <div class="login-container d-flex align-items-center justify-content-center">

        <div class="login-card shadow-lg">

            <!-- Header -->
            <div class="login-header text-center">

                <div class="logo-care">

                    <img src="Assets/CareSyncLogo.png" class="logo me-2" style="width:50px;height:50px">
                    <h2>CareSync</h2>

                </div>

                <p>Smart Digital Healthcare System</p>

            </div>

            <!-- Form -->
            <div class="login-body p-4">

                <h5 class="text-center mb-4">LOGIN TO CONTINUE</h5>

                <form method="POST" onsubmit="return validateLogin()">

                    <div class="mb-3">

                        <label class="form-label">Email Address / Username</label>

                        <input type="text" name="email" id="email" class="form-control"
                            placeholder="Enter your email or username">

                        <small id="emailError" class="text-danger"></small>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Password</label>

                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter your password">

                        <small id="passwordError" class="text-danger"></small>

                    </div>
                    <div class="mb-3 text-end">
                        <a href="#" class="forgot-link" data-bs-toggle="modal" data-bs-target="#successModal">
                            Forgot Password?
                        </a>
                    </div>

                    <div class="d-grid">

                        <input type="submit" class="btn btn-primary login-btn btn-rounded" value="Submit">

                    </div>

                </form>

            </div>

            <!-- Footer -->
            <div class="login-footer text-center p-3">

                <small>Only authorized medical users can access this system</small>

            </div>

        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content forgot-modal">

                <div class="modal-header border-0">
                    <h5 class="modal-title text-white">Reset Password</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">

                    <div class="forgot-icon mb-3">
                        <img src="./icons/gmail.png" class="mx-auto mb-3" width="50">
                    </div>

                    <p class="text-white mb-3">
                        Enter your email to receive a password reset link
                    </p>

                    <form action="./forgotpassword/send_reset.php" method="POST">

                        <input type="email" name="email" class="form-control mb-3"
                            placeholder="Enter your email address" required>

                        <button type="submit" class="btn btn-light reset-btn">
                            Send Reset Link
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>

    <script src="Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./js/login.js"></script>

</body>

</html>