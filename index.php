<?php require_once "includes/header.php" ?>
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
              <h1 class="mb-3">Login</h1>

              <form action="" method="">
                <div class="form-group">
                  <input
                    class="form-control"
                    type="text"
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
                  <button
                    type="submit"
                    class="btn btn-theme button-1 text-white ctm-border-radius btn-block"
                  >
                    Login
                  </button>
                </div>
              </form>

              <div class="text-center forgotpass">
                <a href="#">Forgot Password?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php require_once "includes/footer.php" ?>