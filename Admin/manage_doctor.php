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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['doctor_code']; ?>
                                        </td>

                                        <td>
                                            <?php echo $row['full_name']; ?>
                                        </td>

                                        <td>
                                            <?php echo $row['department']; ?>
                                        </td>

                                        <td>
                                            <?php echo $row['specialization']; ?>
                                        </td>

                                        <td>
                                            <?php echo $row['experience']; ?>
                                        </td>

                                        <td>
                                            <a class="btn btn-success btn-sm btn-rounded fw-bold me-2"
                                                href="edit_doctor.php?id=<?php echo $row['doctor_code']; ?>">
                                                Edit
                                            </a>


                                            <a href="delete_doctor.php?id=<?php echo $row['doctor_code']?>"class="btn btn-danger btn-sm btn-rounded fw-bold" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                onclick="setDeleteId('<?php echo $row['doctor_code']; ?>')">
                                                Delete
                                            </a>

                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {

                                echo "<tr><td colspan='7'>No Doctors Found</td></tr>";

                            }
                            ?> 
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
      <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <h5>Are you sure you want to delete this doctor?</h5>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="deleteBtn" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        /* PASS PATIENT ID TO DELETE BUTTON */
        function setDeleteId(doctorId) {

            document.getElementById("deleteBtn").href =
                "delete_doctor.php?id=" + doctorId;
        }

    </script>
</body>
</html>