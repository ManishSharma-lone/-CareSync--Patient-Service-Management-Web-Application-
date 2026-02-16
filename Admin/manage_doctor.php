<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Management - CareSync</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/manage_doctor.css">

</head>

<body class="admin-bg">

    <div class="container-fluid">

        <!-- HEADER -->
        <div class="card shadow-lg border-0 mt-4">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                <div class="mb-0 manage_doctor">
                    <img src="../icons/medical-staff.png" class="mx-auto mb-3" width="50">
                     Doctor Management
                </div>

                <a href="admin_dashboard.php" class="btn btn-light btn-rounded">
                    Go Back
                </a>
            </div>

            
            <div class="card-body">

                <!-- SEARCH AND FILTER -->
                <div class="row mb-3">

                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Search Doctor...">
                    </div>

                    <div class="col-md-3">
                        <select class="form-control">
                            <option>All Departments</option>
                            <option>Cardiology</option>
                            <option>Neurology</option>
                            <option>Orthopedic</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select class="form-control">
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>

                </div>

                <!-- TABLE -->
                <div class="table-responsive">

                    <table class="table table-hover align-middle text-center">

                        <thead class="table-dark">

                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Specialization</th>
                                <th>Experience</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td>01</td>
                                <td>Dr. Sharma</td>
                                <td>Cardiology</td>
                                <td>Heart Specialist</td>
                                <td>10 yrs</td>

                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>

                                <td>

                                    <button class="btn btn-sm btn-warning btn-rounded">
                                        Edit
                                    </button>

                                    <button class="btn btn-sm btn-danger btn-rounded">
                                        Deactivate
                                    </button>

                                </td>
                            </tr>


                            <tr>
                                <td>02</td>
                                <td>Dr. Mehta</td>
                                <td>Neurology</td>
                                <td>Brain Specialist</td>
                                <td>8 yrs</td>

                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>

                                <td>

                                    <button class="btn btn-sm btn-warning btn-rounded">
                                        Edit
                                    </button>

                                    <button class="btn btn-sm btn-danger btn-rounded">
                                        Deactivate
                                    </button>

                                </td>
                            </tr>


                            <tr>
                                <td>03</td>
                                <td>Dr. Rao</td>
                                <td>Orthopedic</td>
                                <td>Bone Specialist</td>
                                <td>12 yrs</td>

                                <td>
                                    <span class="badge bg-secondary">Inactive</span>
                                </td>

                                <td>

                                    <a class="btn btn-sm btn-warning btn-rounded" href="./edit_doctor.php">
                                        Edit
                                    </a>

                                    <button class="btn btn-sm btn-success btn-rounded">
                                        Activate
                                    </button>

                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>