<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CareSync - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="Bootstrap/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>
    <div class="login-container d-flex align-items-center justify-content-center">
        <div class="login-card shadow-lg">

            <!-- Header -->
            <div class="login-header text-center">
                <div class="logo-care">
                    <img src="/CARESYNC/Assets/CareSyncLogo.png" alt="Logo" class="logo me-2"
                        style="width:50px;height:50px">
                    <h2> CareSync</h2>
                </div>
                <p>Smart Digital Healthcare System</p>
            </div>

            <!-- Form -->
            <div class="login-body p-4">
                <h5 class="text-center mb-4">LOGIN TO CONTINUE</h5>

                <form>

                    <div class="mb-3">
                        <label class="form-label">Email Address / Username</label>
                        <input type="text" class="form-control" placeholder="Enter your email or username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter your password">
                    </div>

                    <div class="mb-3 text-end">
                        <a href="#" class="forgot-link">Forgot Password?</a>
                    </div>

                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary login-btn btn-rounded " value="Submit">
                    </div>

                </form>
            </div>

            <!-- Footer Note -->
            <div class="login-footer text-center p-3">
                <small>Only authorized medical users can access this system</small>
            </div>

        </div>

    </div>

    <script src="Bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>