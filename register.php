<?php
//start session
session_start();

//redirect if logged in
if(isset($_SESSION['user'])){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

    <!--              <div class="d-flex justify-content-center py-4">-->
    <!--                <a href="index.html" class="logo d-flex align-items-center w-auto">-->
    <!--                  <img src="assets/img/logo.png" alt="">-->
    <!--                  <span class="d-none d-lg-block">Webreinvent</span>-->
    <!--                </a>-->
    <!--              </div>-->
                <!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-4">
                    <h5 class="card-title text-center pb-3 fs-4">Create Account</h5>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post" action="includes/function.php">
                    <div class="col-6">
                      <label for="yourName" class="form-label">First Name</label>
                      <input type="text" name="first_name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your First name!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourName" class="form-label">Last Name</label>
                      <input type="text" name="last_name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your Lasr name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPhoneNO" class="form-label">Phone</label>
                      <input type="tel" name="phone" class="form-control" id="yourphone" required>
                      <div class="invalid-feedback">Please enter a valid Phone no!</div>
                    </div>

                      <div class="col-12">
                          <label for="yourEmail" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" id="yourEmail" required>
                          <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                      </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12 mt-4">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" required value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="register_user" type="submit">Create Account</button>
                    </div>
                    <div class="col-12 text-center">
                      <p class="mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>



            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>