<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management - CareSync</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/manage_patient.css">

</head>

<body class="admin-bg">

    <div class="container-fluid px-4 py-4">

        <!-- CARD -->
        <div class="card shadow-lg border-0">

            <!-- HEADER -->
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center gap-2 manage_patient">
                    <img src="../icons/crowd.png" width="40">
                    <h4 class="mb-0 fw-bold">Patient Management</h4>
                </div>

                <a href="admin_dashboard.php" class="btn btn-light btn-rounded  px-4">
                    Go Back
                </a>

            </div>


            <!-- BODY -->
            <div class="card-body">

                <!-- SEARCH BAR -->
                <div class="row mb-4">

                    <div class="col-md-4">

                        <input type="text" class="form-control shadow-sm"
                            placeholder="Search Patient by ID, Name or Phone">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary btn-rounded px-4 fw-bold">
                            Search
                        </button>

                    </div>

                </div>


                <!-- TABLE -->
                <div class="table-responsive">

                    <table class="table table-hover align-middle text-center">

                        <!-- TABLE HEADER -->
                        <thead class="table-dark">

                            <tr>

                                <th>Patient ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Actions</th>

                            </tr>

                        </thead>


                        <!-- TABLE BODY -->
                        <tbody>

                            <tr>

                                <td>P1001</td>
                                <td>Manish Sharma</td>
                                <td>26</td>
                                <td>Male</td>
                                <td>8340778990</td>
                                <td>Bhubaneswar</td>

                                <td>

                                    <a class="btn btn-success btn-sm btn-rounded fw-bold me-2" href="./edit_patient.php">
                                        Edit
                                    </a>

                                    <button class="btn btn-danger btn-sm btn-rounded fw-bold"
                                        onclick="confirmDelete('P1001')">
                                        Delete
                                    </button>

                                </td>

                            </tr>


                            <tr>

                                <td>P1002</td>
                                <td>Ravi Kumar</td>
                                <td>32</td>
                                <td>Male</td>
                                <td>9876543210</td>
                                <td>Cuttack</td>

                                <td>

                                    <a class="btn btn-success btn-sm btn-rounded fw-bold me-2" href="./edit_patient.php">
                                        Edit
                                    </a>

                                    <button class="btn btn-danger btn-sm btn-rounded fw-bold"
                                        onclick="confirmDelete('P1002')">
                                        Delete
                                    </button>

                                </td>

                            </tr>


                            <tr>

                                <td>P1003</td>
                                <td>Anita Das</td>
                                <td>27</td>
                                <td>Female</td>
                                <td>9123456780</td>
                                <td>Puri</td>

                                <td>

                                    <a class="btn btn-success btn-sm btn-rounded fw-bold me-2"
                                        href="./edit_patient.php">
                                        Edit
                                    </a>

                                    <button class="btn btn-danger btn-sm btn-rounded fw-bold"
                                        onclick="confirmDelete('P1003')">
                                        Delete
                                    </button>

                                </td>

                            </tr>


                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    <!-- DELETE CONFIRM SCRIPT -->
    <script>

        function confirmDelete(patientId) {

            if (confirm("Are you sure you want to delete Patient ID: " + patientId + " ?")) {
                alert("Patient " + patientId + " deleted successfully");

                /* PHP delete code will go here later */

                /* Example:
                window.location.href = "delete_patient.php?id=" + patientId;
                */

            }

        }

    </script>


</body>

</html>