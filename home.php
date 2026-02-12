<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareSync</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/CARESYNC/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
     <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/home.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar" id="home">
        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/CARESYNC/Assets/CareSyncLogo.png" alt="Logo" class="logo me-2"
                    style="width:50px;height:50px">
                CareSync
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="#">Home</a>
                    <a class="nav-link" href="#services">Services</a>
                    <a class="nav-link" href="#contact">Contact</a>
                    <a class="nav-link" href="#">Login</a>
                </div>
            </div>
        </div>
    </nav>



    <div class="container mt-5">
        <div class="row align-items-center">

            <!-- LEFT SIDE (TEXT) -->
            <div class="col-12 col-md-6 text-center text-md-start mb-4 mb-md-0">
                <h2 class="fw-bold">CareSync - Smart Digital Healthcare Solution</h2>
                <p class="lead mt-3">Digitizing Prescriptions. Simplifying Healthcare. CareSync transforms traditional
                    handwritten medical records into secure, organized digital data, making healthcare management
                    faster, safer, and more efficient. By reducing paperwork and minimizing errors, the system helps
                    doctors, patients, and healthcare staff access important information anytime, anywhere. From
                    appointment scheduling to prescription tracking, CareSync streamlines every step of the healthcare
                    journey, ensuring better coordination, improved patient care, and a smarter digital healthcare
                    experience.</p>

                <div class="text-center text-md-start mt-4">
                    <a href="#" class="btn appoint btn-lg px-4" style=" background-color: #2563EB;color:#F8FAFC">Book
                        Appointment</a>
                </div>
            </div>

            <!-- RIGHT SIDE (IMAGE) -->
            <div class="col-12 col-md-6 text-center">
                <img src="/CARESYNC/Assets/Hero.jpg" alt="Healthcare" class="img-fluid hero-img">
            </div>
        </div>
    </div>



    <!-- SERVICES SECTION -->
    <div class="container mt-5" id="services">
        <div class="text-center mb-4">
            <h3 class="fw-bold">Our Services</h3>
            <p class="text-muted">Departments</p>
        </div>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm service-card text-center p-3">
                    <img src="icons/doctor.png" class="mx-auto mb-3" width="60">
                    <h5 class="fw-bold">General Medicine</h5>
                    <p class="text-muted">Primary healthcare services for routine checkups and treatments.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm service-card text-center p-3">
                    <img src="icons/cardiology.png" class="mx-auto mb-3" width="60">
                    <h5 class="fw-bold">Cardiology</h5>
                    <p class="text-muted">Advanced heart care with modern diagnostic facilities.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm service-card text-center p-3">
                    <img src="icons/brain-icon.png" class="mx-auto mb-3" width="60">
                    <h5 class="fw-bold">Neurology</h5>
                    <p class="text-muted">Specialized treatment for neurological disorders.</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm service-card text-center p-3">
                    <img src="icons/lab-icon.png" class="mx-auto mb-3" width="60">
                    <h5 class="fw-bold">Diagnostics</h5>
                    <p class="text-muted">Lab tests and digital reports for accurate results.</p>
                </div>
            </div>



            <!-- Card 5 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm service-card text-center p-3">
                    <img src="icons/pediatrics.png" class="mx-auto mb-3" width="60">
                    <h5 class="fw-bold">Pediatrics</h5>
                    <p class="text-muted">Comprehensive healthcare services for infants, children, and adolescents.</p>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm service-card text-center p-3">
                    <img src="icons/orthopedist.png" class="mx-auto mb-3" width="60">
                    <h5 class="fw-bold">Orthopedics</h5>
                    <p class="text-muted">Treatment for bone, joint, and muscle-related conditions and injuries.</p>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm service-card text-center p-3">
                    <img src="icons/pediatrician.png" class="mx-auto mb-3" width="60">
                    <h5 class="fw-bold">Gynecology</h5>
                    <p class="text-muted">Specialized care for women's reproductive health and wellness.</p>
                </div>
            </div>

            <!-- Card 8 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm service-card text-center p-3">
                    <img src="icons/emergency.png" class="mx-auto mb-3" width="60">
                    <h5 class="fw-bold">Emergency Care</h5>
                    <p class="text-muted">24/7 emergency medical services for urgent and critical conditions.</p>
                </div>
            </div>
        </div>
    </div>


    <section id="contact">
        <div class="text-center mb-4">
            <h3 class="fw-bold">Contact US</h3>
        </div>
        <div class="container">
            <div class="contact-card">
                <div class="row g-0">

                    <!-- LEFT INFO PANEL -->
                    <div class="col-md-5 contact-info">
                        <h2>Let's Connect</h2>
                        <p>Have questions about CareSync? Our team is here to help you anytime.</p>

                        <p>📍 Bhubaneswar, Odisha, India</p>
                        <p>📞 +91 98765 43210</p>
                        <p>✉️ support@caresync.com</p>

                        <!-- MAP BELOW EMAIL -->
                        <div class="map-left mt-4">
                            <iframe src="https://www.google.com/maps?q=Bhubaneswar,Odisha,India&output=embed"
                                allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>

                    </div>

                    <!-- RIGHT FORM PANEL -->
                    <div class="col-md-7 contact-right">
                        <div class="contact-form">
                            <h4 class="mb-4">Send us a Message</h4>

                            <form>
                                <input type="text" placeholder="Full Name" required>
                                <input type="email" placeholder="Email Address" required>
                                <textarea rows="4" placeholder="Your Message" required></textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
   <!-- WAVE SHAPE -->
<div class="footer-wave">
  <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
    <path fill="#2563EB" fill-opacity="1"
      d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96V120H0Z">
    </path>
  </svg>
</div>

<footer class="footer">
  <div class="container">
    <div class="row gy-4">

      <!-- About -->
      <div class="col-md-4">
        <h5 class="footer-brand">CareSync</h5>
        <p class="footer-text">
          Smart digital healthcare solution helping doctors and patients
          manage medical data efficiently and securely.
        </p>

        <!-- Social Icons -->
        <div class="social-icons">
          <a href="#"> <img src="icons/facebook.png" class="mx-auto mb-3" width="50"></a>
          <a href="#"> <img src="icons/social.png" class="mx-auto mb-3" width="50"></i></a>
          <a href="#"> <img src="icons/twitter.jpeg" class="mx-auto mb-3 rounded-circle" width="50"></i></a>
          <a href="#"> <img src="icons/linkedin.jpeg" class="mx-auto mb-3 rounded-circle" width="53"></a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-md-3">
        <h6 class="footer-title">Quick Links</h6>
        <ul class="footer-links">
          <li><a href="#home">Home</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>

      <!-- Legal -->
      <div class="col-md-2">
        <h6 class="footer-title">Legal</h6>
        <ul class="footer-links">
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
        </ul>
      </div>

      <!-- Newsletter -->
      <div class="col-md-3">
        <h6 class="footer-title">Newsletter</h6>
        <p class="footer-text">Subscribe to get health tech updates.</p>
        <form class="newsletter-form">
          <input type="email" placeholder="Your email" required>
          <button type="submit">Subscribe</button>
        </form>
      </div>

    </div>

    <!-- Bottom -->
    <div class="footer-bottom text-center mt-4">
      © 2026 CareSync. All Rights Reserved.
    </div>
  </div>
</footer>



    <!-- Bootstrap JS -->
    <script src="/CARESYNC/Bootstrap/bootstrap.bundle.min.js"></script>

</body>

</html>