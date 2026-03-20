function validateForm(){

    // input values
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let mobile = document.getElementById("mobile").value.trim();
    let dob = document.getElementById("dob").value;
    let aadhar = document.getElementById("aadhar").value.trim();
    let blood = document.getElementById("blood").value;
    let city = document.getElementById("city").value.trim();
    let address = document.getElementById("address").value.trim();
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;

    let gender = document.querySelector('input[name="gender"]:checked');

    // regex patterns
    let nameRegex = /^[A-Za-z ]+$/;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let mobileRegex = /^[6-9][0-9]{9}$/;
    let aadharRegex = /^[0-9]{12}$/;
    let cityRegex = /^[A-Za-z ]+$/;
    let passwordRegex = /^.{6,}$/;

    // clear old error messages
    document.querySelectorAll(".text-danger").forEach(function(el){
        el.textContent = "";
    });

    let isValid = true;

    // Name validation
    if(!nameRegex.test(name)){
        document.getElementById("nameError").textContent = "Enter valid name (letters only)";
        isValid = false;
    }

    // Email validation
    if(!emailRegex.test(email)){
        document.getElementById("emailError").textContent = "Enter valid email address";
        isValid = false;
    }

    // Mobile validation
    if(!mobileRegex.test(mobile)){
        document.getElementById("mobileError").textContent = "Enter valid 10 digit mobile number";
        isValid = false;
    }

    // DOB validation
    if(dob === ""){
        document.getElementById("dobError").textContent = "Please select date of birth";
        isValid = false;
    }

    // Gender validation
    if(!gender){
        document.getElementById("genderError").textContent = "Please select gender";
        isValid = false;
    }

    // Aadhar validation
    if(!aadharRegex.test(aadhar)){
        document.getElementById("aadharError").textContent = "Enter valid 12 digit Aadhar number";
        isValid = false;
    }

    // Blood group validation
    if(blood === "Select Blood Group"){
        document.getElementById("bloodError").textContent = "Please select blood group";
        isValid = false;
    }

    // City validation
    if(!cityRegex.test(city)){
        document.getElementById("cityError").textContent = "Enter valid city name";
        isValid = false;
    }

    // Address validation
    if(address === ""){
        document.getElementById("addressError").textContent = "Address cannot be empty";
        isValid = false;
    }

    // Password validation
    if(!passwordRegex.test(password)){
        document.getElementById("passwordError").textContent = "Password must be at least 6 characters";
        isValid = false;
    }

    // Confirm password validation
    if(password !== confirmPassword){
        document.getElementById("confirmPasswordError").textContent = "Passwords do not match";
        isValid = false;
    }

    return isValid;
}

//Aadhar Verification

// let txnId = "";
// let aadhaarVerified = false;

// async function sendOtp() {
//     const aadhaar = document.getElementById("aadhar").value;
//     if (aadhaar.length !== 12) {
//         alert("Enter valid 12-digit Aadhaar number");
//         return;
//     }

//     document.getElementById("sendOtpBtn").disabled = true;

//     const res = await fetch("../Aadhar/send_otp.php", { 
//         method: "POST",
//         headers: { "Content-Type": "application/json" },
//         body: JSON.stringify({ aadhaar })
//     });
//     const data = await res.json();

//     if (data.txnId) {
//         txnId = data.txnId;
//         document.getElementById("otpSection").style.display = "block";
//         document.getElementById("otpMsg").innerText = "OTP sent to registered mobile.";
//     } else {
//         alert("Error sending OTP: " + JSON.stringify(data));
//         document.getElementById("sendOtpBtn").disabled = false;
//     }
// }

// async function verifyOtp() {
//     const otp = document.getElementById("aadhaarOtp").value;
//     if (otp.length !== 6) {
//         alert("Enter 6-digit OTP");
//         return;
//     }

//     const res = await fetch("../Aadhar/verify_otp.php", {
//         method: "POST",
//         headers: { "Content-Type": "application/json" },
//         body: JSON.stringify({ txnId, otp })
//     });

//     const data = await res.json();

//     if (data.success !== false) {
//         aadhaarVerified = true;
//         document.getElementById("otpMsg").innerText = "Aadhaar verified successfully!";
//         document.getElementById("aadhaarOtp").disabled = true;
//     } else {
//         alert("OTP verification failed: " + JSON.stringify(data));
//     }
// }

// // Prevent form submission if Aadhaar not verified
// document.getElementById("patientForm").addEventListener("submit", function(e) {
//     if (!aadhaarVerified) {
//         e.preventDefault();
//         alert("Please verify Aadhaar before submitting the form.");
//     }
// });
