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
                header("Location: ./Admin/admin_dashboard.php");
                exit();
            } elseif ($row['role'] == "doctor") {
                header("Location: ./Doctor/doctor_dashboard.php");
                exit();
            } elseif ($row['role'] == "patient") {
                header("Location: ./Patient/patient_dashboard.php");
                exit();
            } elseif ($row['role'] == "attendee") {
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

</head>

<body>

    <div class="login-container d-flex align-items-center justify-content-center">

        <div class="login-card shadow-lg">

            <!-- Header -->
            <div class="login-header text-center">

                <div class="logo-care">

                    <img src="/CARESYNC/Assets/CareSyncLogo.png" class="logo me-2" style="width:50px;height:50px">
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

                        <a href="#" class="forgot-link">Forgot Password?</a>

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

    <script src="Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./js/login.js"></script>

</body>

</html>