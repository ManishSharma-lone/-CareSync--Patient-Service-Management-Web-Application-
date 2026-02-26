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

                <form>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select">
                                <option value="">Select Department</option>
                                <option value="Cardiology">Cardiology</option>
                                <option value="Neurology">Neurology</option>
                                <option value="Orthopedics">Orthopedics</option>
                                <option value="Gynecology">Gynecology</option>
                                <option value="Pediatrics">Pediatrics</option>
                                <option value="General Medicine">General Medicine</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Specialization</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Experience (Years)</label>
                            <input type="number" class="form-control" placeholder="0">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" placeholder="">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Create Password</label>
                            <input type="password" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control">
                        </div>

                    </div>

                    <div class="text-center mt-4">
                        <button class="add-btn">
                            Add Doctor
                        </button>
                    </div>

                </form>

            </div>

            <!-- Footer -->
            <div class="card-footer footer-text">
                CareSync Admin Panel • Secure Doctor Registration
            </div>

        </div>

    </div>

</body>

</html>