<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CareSync - Update Patient</title>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/add_patient.css">
</head>

<body class="patient-bg">

    <div class="container mt-5 mb-5">

        <div class="card patient-card border-0">

            <!-- Header -->
          <div class="patient-header d-flex align-items-center gap-3">

                <div class="icon-circle">
                    <img src="../icons/crowd.png" class="mx-auto mb-3" width="50">
                </div>

                <div class="add">
                    <h3 class="mb-0">Update Patient</h3>
                </div>

            </div>


            <!-- Form -->
            <div class="card-body p-4">

                <form>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Patient Full Name</label>
                            <input type="text" class="form-control custom-input" placeholder="Enter full name">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control custom-input" placeholder="Enter email">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="tel" class="form-control custom-input" placeholder="Enter mobile number">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control custom-input">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label d-block">Gender</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender">
                                <label class="form-check-label">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender">
                                <label class="form-check-label">Female</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender">
                                <label class="form-check-label">Other</label>
                            </div>

                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Aadhar ID</label>
                            <input type="text" class="form-control custom-input" placeholder="Enter Aadhar number">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Blood Group</label>

                            <select class="form-select custom-input">
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
                            <input type="text" class="form-control custom-input" placeholder="Enter city">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control custom-input" rows="2"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Create Password</label>
                            <input type="password" class="form-control custom-input">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control custom-input">
                        </div>

                    </div>

                    <div class="text-center mt-4">

                        <input type="submit" class="btn register-btn" value="Update Patient">

                    </div>

                </form>

            </div>

            <!-- <div class="card-footer text-center footer-text">
                After registration, login details can be shared securely with the patient
            </div> -->

        </div>

    </div>

</body>

</html>