<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Mazer Admin Dashboard</title>

  <link rel="stylesheet" href="../assets/compiled/css/app.css">
  <link rel="stylesheet" href="../assets/compiled/css/app-dark.css">
  <link rel="stylesheet" href="../assets/compiled/css/auth.css">
</head>

<body>
  <script src="../assets/static/js/initTheme.js"></script>
  <div id="auth">

    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <h2>Vehicle Management</h2>
          </div>
          <h1 class="auth-title">Sign Up</h1>
          <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

          <form action="<?= BASE_URL; ?>/Auth/signup" method="post">
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" class="form-control form-control-xl" placeholder="Name" name="name" required>
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" class="form-control form-control-xl" placeholder="Email" name="email" required>
              <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" required>
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="password" class="form-control form-control-xl" placeholder="Confirm Password" name="confirm_password" required>
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
          </form>
          <div class="text-center mt-5 text-lg fs-4">
            <p class='text-gray-600'>Already have an account? <a href="<?= BASE_URL; ?>/Auth/signin" class="font-bold">Log
                in</a>.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/static/js/components/dark.js"></script>
  <script src="../assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="../assets/compiled/js/app.js"></script>

  <?= Flasher::flash(); ?>

</body>

</html>