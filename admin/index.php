<?php
  $title = "Admin login";
  require_once "../includes/header.php";
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
              <h1 class="mb-3">Welcome, Admin</h1>

              <form action="" method="" id="adminLoginForm">
                <div class="form-group position-relative">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email"
                    data-parsley-required-message="Your email is required"
                    data-parsley-pattern="/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/"
                    data-parsley-pattern-message="Use a valid email address"
                    required
                  />

                  <span class="d-block invalid-feedback"></span>
                </div>

                <div class="form-group position-relative">
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Password"
                    data-parsley-required-message="Your password is required"
                    required
                  />

                  <span class="eye-icon">
                    <i class="fa fa-eye"></i>
                  </span>

                  <span class="d-block invalid-feedback"></span>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php require_once "../includes/footer.php" ?>

<script>
  $(function () {
    $("#adminLoginForm").parsley();
    $("#adminLoginForm").on("submit", function (e) {
      e.preventDefault();

      if ($("#adminLoginForm").parsley().isValid()) {
        $.ajax({
          url: "auth/login.php",
          method: "POST",
          data: $(this).serialize(),
          success: function (response) {
            var data = JSON.parse(response);

            if (data.length === 0) {
              window.location = "dashboard.php";
            }

            if (data.email) {
              $("#email").closest(".form-group").children(".invalid-feedback").text(data.email);
              $("#email").on("input", function() {
                $("#email").closest(".form-group").children(".invalid-feedback").text("");
              })
            }

            if (data.password) {
              $("#password").closest(".form-group").children(".invalid-feedback").text(data.password);
              $("#password").on("input", function() {
                $("#password").closest(".form-group").children(".invalid-feedback").text("");
              })
            }
          }
        });
      }
    });
  });
</script>