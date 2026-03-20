<?php
include '../dbconnect.php';

$patient_id = $_POST['patient_id'];
$doctor_id = $_POST['doctor_id'];
$date = $_POST['date'];
$time = $_POST['slot'];

// Check if slot already booked
$check = "SELECT * FROM appointments 
          WHERE doctor_id='$doctor_id' 
          AND appointment_date='$date' 
          AND appointment_time='$time'";

$result = $conn->query($check);

if($result->num_rows > 0){
    echo "<script>alert('Slot already booked!'); window.history.back();</script>";
    exit();
}

// Insert
$sql = "INSERT INTO appointments 
        (patient_id, doctor_id, appointment_date, appointment_time)
        VALUES ('$patient_id', '$doctor_id', '$date', '$time')";

if($conn->query($sql)){
    echo "<script>alert('Appointment Booked Successfully'); window.location='patient_dashboard.php';</script>";
} else {
    echo "Error: ".$conn->error;
}
?>