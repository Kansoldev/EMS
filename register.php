<?php
  $title = "Register";
  require_once "includes/header.php";
?>
  <div id="loader-wrapper">
    <div class="loader">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  </div>

  <div class="inner-wrapper login-body">
    <div class="login-wrapper">
      <div class="container">
        <div class="loginbox shadow-sm grow">
          <div class="login-left">
            <img src="<?php echo WEB_URL ?>img/logo.png" class="img-fluid" alt="Logo" />
          </div>

          <div class="login-right">
            <div class="login-right-wrap">
              <h1 class="mb-3">Register</h1>

              <form action="" method="">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First name"
                  />
                </div>

                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last name"
                  />
                </div>

                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Email"
                  />
                </div>

                <div class="form-group">
                  <input
                    type="password"
                    class="form-control"
                    placeholder="Password"
                  />
                </div>

                <div class="form-group">
                  <input
                    type="password"
                    class="form-control"
                    placeholder="Confirm Password"
                  />
                </div>

                <div class="form-group mb-0">
                  <button
                    type="submit"
                    class="btn btn-theme button-1 text-white ctm-border-radius btn-block"
                  >
                    Register
                  </button>
                </div>
              </form>

              <div class="text-center dont-have">
                Already have an account? <a href="<?php echo WEB_URL ?>">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php require_once "includes/footer.php" ?>
