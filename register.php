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

              <form id="registerForm" action="" method="">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First name"
                    name="firstname"
                    data-parsley-pattern="^[A-Za-z]{1,30}$"
                    data-parsley-pattern-message="Special characters or numbers not allowed"
                    data-parsley-minlength="3"
                    data-parsley-minlength-message="First name should be at least 3 characters"
                    data-parsley-required-message="Your first name is required"
                    required
                  />
                </div>

                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last name"
                    name="lastname"
                    data-parsley-pattern="^[A-Za-z]{1,30}$"
                    data-parsley-pattern-message="Special characters or numbers not allowed"
                    data-parsley-minlength="3"
                    data-parsley-minlength-message="Last name should be at least 3 characters"
                    data-parsley-required-message="Your last name is required"
                    required
                  />
                </div>

                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    placeholder="Email"
                    name="email"
                    data-parsley-pattern="/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/"
                    data-parsley-pattern-message="Use a valid email address"
                    data-parsley-required-message="Your email is required"
                    required
                  />

                  <span class="d-block invalid-feedback"></span>
                </div>

                <div class="form-group position-relative">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    placeholder="Password"
                    name="password"
                    data-parsley-minlength="4"
                    data-parsley-minlength-message="Password should be at least 4 characters"
                    data-parsley-required-message="Your password is required"
                    required
                  />

                  <span class="eye-icon">
                    <i class="fa fa-eye"></i>
                  </span>
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

<script>
  $(function () {
    $("#registerForm").parsley();
    $("#registerForm").on("submit", function (e) {
      e.preventDefault();

      if ($("#registerForm").parsley().isValid()) {
        $.ajax({
          url: "auth/register.php",
          method: "POST",
          data: $(this).serialize(),
          beforeSend: function() {
            $(".button-1").attr("disabled", true);
            $(".button-1").text("Please wait...");
          },
          success: function (response) {
            $(".button-1").removeAttr("disabled");
            $(".button-1").text("Register");

            var data = JSON.parse(response);

            if (data.length === 0) {
              window.location = "<?php echo WEB_URL ?>NewEmployee.php";
            }

            if (data.email) {
              $("#email").closest(".form-group").children(".invalid-feedback").text(data.email);
              $("#email").on("input", function() {
                $("#email").closest(".form-group").children(".invalid-feedback").text("");
              })
            }
          }
        });
      }
    });
  });
</script>