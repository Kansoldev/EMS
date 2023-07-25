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
              <h1 class="mb-3">Account Info</h1>

              <p class="account-subtitle">Fill this details to complete your registration</p>

              <form id="employeeDetails" action="" method="">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Phone number"
                    name="phone"
                    data-parsley-pattern="^[0-9]{1,30}$"
                    data-parsley-pattern-message="Your phone number should have only numbers"
                    data-parsley-required-message="Your phone number is required"
                    required
                  />
                </div>

                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Date of birth"
                    name="dob"
                    required
                  />
                </div>

                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Job Title"
                    name="job"
                    data-parsley-pattern="^[A-Za-z ]{1,30}$"
                    data-parsley-pattern-message="Special characters or numbers not allowed"
                    data-parsley-required-message="Your Job Title is required"
                    required
                  />
                </div>

                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Address"
                    name="address"
                    data-parsley-required-message="Your residential address is required"
                    required
                  />
                </div>

                <div class="form-group mb-0">
                  <button
                    type="submit"
                    class="btn btn-theme button-1 text-white ctm-border-radius btn-block"
                  >
                    Finish
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php require_once "includes/footer.php" ?>

<script src="<?php echo WEB_URL ?>js/parsley.min.js"></script>
<script>
  $(function () {
    $("#employeeDetails").parsley();
    $("#employeeDetails").on("submit", function (e) {
      e.preventDefault();

      if ($("#employeeDetails").parsley().isValid()) {
        $.ajax({
          // url: "<?php echo $_SERVER["PHP_SELF"] ?>",
          url: "auth/CompleteReg.php",
          method: "POST",
          data: $(this).serialize(),
          beforeSend: function() {
            $(".button-1").attr("disabled", true);
            $(".button-1").text("Please wait...");
          },
          success: function (response) {
            $(".button-1").removeAttr("disabled");
            $(".button-1").text("Finish");

            if (response === "") {
              window.location = "<?php echo WEB_URL ?>dashboard.php";
            } 
          }
        });
      }
    });
  });
</script>