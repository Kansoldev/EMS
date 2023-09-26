<?php
  $title = "EMS | Add Employee";
  require_once "../config/db.php";
  require_once "../includes/header.php";
  require_once "../includes/functions.php";

  $faculties = queryTableColumn("faculties");
?>
  <div class="inner-wrapper">
    <div id="loader-wrapper">
      <div class="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
    </div>

    <?php require_once "includes/topHeader.php" ?>

    <div class="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <?php require_once "includes/sidebar.php" ?>

          <div class="col-xl-9 col-lg-8 col-md-12">
            <form action="" id="addEmployeeForm">
              <div class="accordion add-employee" id="accordion-details">
                <div class="card shadow-sm grow ctm-border-radius">
                  <div class="card-header" id="basic1">
                    <h4 class="cursor-pointer mb-0">
                      <a
                        class="coll-arrow d-block text-dark"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#basic-one"
                        aria-expanded="true"
                      >
                        Basic Details
                      </a>
                    </h4>
                  </div>

                  <div class="card-body p-0">
                    <div
                      id="basic-one"
                      class="collapse show ctm-padding"
                      aria-labelledby="basic1"
                      data-parent="#accordion-details"
                    >
                      <div class="row">
                        <div class="col-12 form-group">
                          <input
                            type="text"
                            class="form-control"
                            name="firstname"
                            placeholder="First Name"
                          />
                        </div>

                        <div class="col-12 form-group">
                          <input
                            type="text"
                            class="form-control"
                            name="lastname"
                            placeholder="Last Name"
                          />
                        </div>

                        <div class="col-12 form-group">
                          <input
                            type="text"
                            class="form-control"
                            name="phone_number"
                            placeholder="Phone number"
                          />
                        </div>

                        <div class="col-12 form-group">
                          <input
                            type="email"
                            class="form-control"
                            name="email"
                            placeholder="Email"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card shadow-sm grow ctm-border-radius">
                  <div class="card-header" id="headingTwo">
                    <h4 class="cursor-pointer mb-0">
                      <a
                        class="coll-arrow d-block text-dark"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#employee-det"
                      >
                        Employment Details
                      </a>
                    </h4>
                  </div>
                  
                  <div class="card-body p-0">
                    <div
                      id="employee-det"
                      class="collapse show ctm-padding"
                      aria-labelledby="headingTwo"
                      data-parent="#accordion-details"
                    >
                      <div class="row">
                        <div class="col-12 form-group">
                          <div class="cal-icon">
                            <input
                              class="form-control datetimepicker cal-icon-input"
                              type="text"
                              name="dob"
                              placeholder="Date of birth"
                            />
                          </div>
                        </div>

                        <div class="col-12 form-group">
                          <div class="cal-icon">
                            <input
                              class="form-control datetimepicker cal-icon-input"
                              type="text"
                              name="hired"
                              placeholder="Hired date"
                            />
                          </div>
                        </div>

                        <div class="col-12 form-group">
                          <input
                            type="text"
                            class="form-control"
                            name="job"
                            placeholder="Job Title"
                          />
                        </div>

                        <div class="col-12 form-group">
                          <input
                            type="text"
                            class="form-control"
                            name="address"
                            placeholder="Address"
                          />
                        </div>

                        <div class="col-12 form-group my-4">
                          <p class="mb-2">Select Gender</p>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input
                              type="radio"
                              class="custom-control-input"
                              id="male"
                              name="gender"
                              checked
                            />

                            <label class="custom-control-label" for="male" >Male</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input
                              type="radio"
                              class="custom-control-input"
                              id="female"
                              name="gender"
                            />

                            <label class="custom-control-label" for="female">Female</label>
                          </div>
                        </div>

                        <div class="col-md-6 form-group">
                          <select id="faculties" class="form-control" name="faculties">
                            <option value="">Select faculty</option>

                            <?php foreach ($faculties as $faculty): ?>
                              <option value="<?php echo $faculty["id"] ?>"><?php echo ucwords($faculty["faculty_name"]) ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>

                        <div class="col-md-6 form-group">
                          <select id="departments" class="form-control" name="department">
                            <option value="">Select department</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="card shadow-sm grow ctm-border-radius">
                  <div class="card-header" id="headingFour">
                    <h4 class="cursor-pointer mb-0">
                      <a
                        class="coll-arrow d-block text-dark"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#salary_det"
                      > Salary Details </a>
                    </h4>
                  </div>

                  <div class="card-body p-0">
                    <div
                      id="salary_det"
                      class="collapse show ctm-padding"
                      aria-labelledby="headingFour"
                      data-parent="#accordion-details"
                    >
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <input
                            type="text"
                            class="form-control"
                            name="amount"
                            placeholder="Amount"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="submit-section text-center btn-add">
                    <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">
                      Add Employee
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php require_once "../includes/footer.php" ?>

<script>
  document.querySelector("#faculties").addEventListener("change", (e) => {
    document.querySelector("#departments").innerHTML = "";
    document.querySelector("#departments").parentElement.classList.add("d-none");

    fetch("../src/fetchDept.php", {
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
</script>
