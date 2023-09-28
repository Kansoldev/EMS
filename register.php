<?php
  $title = "Register";
  require_once "includes/header.php";

  $faculties = queryTableColumn("faculties");
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
                <div class="form-section">
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

                  <div class="form-group mt-4">
                    <h5>Select your Gender</h5>

                    <div class="d-flex mt-1">
                      <div class="custom-control custom-radio">
                        <input
                          type="radio"
                          id="male"
                          name="gender"
                          value="male"
                          class="custom-control-input"
                          checked
                        />

                        <label for="male" class="custom-control-label">Male</label>
                      </div>

                      <div class="custom-control custom-radio ml-4">
                        <input
                          type="radio"
                          id="female"
                          name="gender"
                          value="female"
                          class="custom-control-input"
                        />

                        <label for="female" class="custom-control-label">Female</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-section">
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
                      id="dob"
                      class="form-control datetimepicker"
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

                  <div class="form-group">
                    <select
                      id="faculties"
                      class="form-control"
                      name="faculty"
                      data-parsley-required-message="Select a faculty"
                      required
                    >
                      <option value="">Select faculty</option>

                      <?php foreach ($faculties as $faculty): ?>
                        <option value="<?php echo $faculty["id"] ?>"><?php echo ucwords($faculty["faculty_name"]) ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group d-none">
                    <select id="departments" class="form-control" name="department">
                      <option value="">Select department</option>
                    </select>
                  </div>
                </div>

                <div class="form-navigation">
                  <button type="button" class="btn btn-secondary pull-left previous"><i class="lnr lnr-arrow-left"></i> Back</button>
                  <button type="button" class="btn btn-theme next">Proceed <i class="lnr lnr-chevron-right-circle"></i></button>
                  <button type="submit" class="btn btn-theme pull-right">Submit</button>
                  <span class="clearfix"></span>
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
  document.querySelector("#faculties").addEventListener("change", (e) => {
    document.querySelector("#departments").innerHTML = "";
    document.querySelector("#departments").parentElement.classList.add("d-none");

    fetch("./src/fetchDept.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        facultyID: e.target.value,
      }),
    })
    .then((data) => data.json())
    .then((response) => {
      if (response.departments.length > 0) {
        document.querySelector("#departments").parentElement.classList.remove("d-none");
        
        response.departments.forEach(department => {
          option = document.createElement("option");
          option.value = department.id;
          option.appendChild(document.createTextNode(department.department_name));
          document.querySelector("#departments").appendChild(option);
        })
      }
    });
  });

  $(function () {
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
              window.location = "<?php echo WEB_URL ?>dashboard.php";
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

    // Code to handle multi-step validation
    var $sections = $('.form-section');

    // Set the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
    $sections.each(function(index, section) {
      $(section).find(':input').attr('data-parsley-group', 'block-' + index);
    });

    function navigateTo(index) {
      // Mark the current section with the class 'current'
      $sections
        .removeClass('current')
        .eq(index)
        .addClass('current');

      var atTheEnd = index >= $sections.length - 1;

      // Show only the navigation buttons that make sense for the current section:
      $('.form-navigation .previous').toggle(index > 0);
      $('.form-navigation .next').toggle(!atTheEnd);
      $('.form-navigation [type=submit]').toggle(atTheEnd);
    }

    function curIndex() {
      // Returns the current index by looking at which section has the class 'current'
      return $sections.index($sections.filter('.current'));
    }

    $('.form-navigation .previous').click(function() {
      navigateTo(curIndex() - 1);
    });

     // Next button goes forward if current block validates
    $('.form-navigation .next').click(function() {
      $('#registerForm').parsley().whenValidate({
        group: 'block-' + curIndex()
      }).done(function() {
        navigateTo(curIndex() + 1);
      });
    });

    navigateTo(0); // Start at the beginning
  });
</script>