<!DOCTYPE html>
<html lang="en">
<head>
<title>Book Appointment</title>

<link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="../styles/book_appointment.css">

</head>

<body>

<div class="main-container">

<div class="appointment-card">

    <!-- TOP BLUE SECTION -->
    <div class="top-section text-center">

        <img src="/CARESYNC/Assets/CareSyncLogo.png" class="logo">

        <h1>CareSync</h1>

        <p>Smart Digital Healthcare System</p>

    </div>


    <!-- FORM SECTION -->
    <div class="form-section">

        <h3 class="text-center mb-4">BOOK APPOINTMENT</h3>

        <form>

            <label>Select Doctor</label>

            <select class="form-control mb-3">
                <option>Select Doctor</option>
                <option>Dr Sharma - Cardiologist</option>
                <option>Dr Amit - Neurologist</option>
                <option>Dr Mehta - Dentist</option>
            </select>


            <label>Appointment Date</label>

            <input type="date" class="form-control mb-3">


            <label>Available Slots</label>

            <div class="slots">

                <input type="radio" name="slot" id="s1">
                <label for="s1">09:00 AM</label>

                <input type="radio" name="slot" id="s2">
                <label for="s2">09:30 AM</label>

                <input type="radio" name="slot" id="s3">
                <label for="s3">10:00 AM</label>

            </div>


            <div class="text-end mt-3">
                <span class="status">Status : Available</span>
            </div>


            <button class="submit-btn mt-4">
                Confirm Appointment
            </button>

        </form>

    </div>


    <!-- FOOTER -->
    <div class="footer">
        Only authorized medical users can access this system
    </div>

</div>

</div>

</body>
</html>