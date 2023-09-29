<?php
  $title = "Admin Dashboard";

  require_once "../config/db.php";
  require_once "../includes/functions.php";
  require_once "../includes/header.php";

  if (!isset($_SESSION["admin"])) {
    header("location: " . WEB_URL . "admin");
  }

  $salaries = queryTableColumn("employees", "salary");
  $totalEmployeeSalaries = 0;

  foreach ($salaries as $key => $employee) {
    $totalEmployeeSalaries += $employee["salary"];
  }

  $stmt = $pdo->prepare("SELECT * FROM leave_requests lr JOIN employees emp ON lr.employee_id = emp.id");
  $stmt->execute();
  $leavesCount = $stmt->rowCount();
  $leaveRequests = $stmt->fetchAll();
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
            <div class="row">
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                  <div class="card-body">
                    <div class="card-icon bg-primary">
                      <i class="fa fa-users" aria-hidden="true"></i>
                    </div>

                    <div class="card-right">
                      <h4 class="card-title">Employees</h4>
                      <p class="card-text"><?php echo countTableAll("employees") ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                  <div class="card-body">
                    <div class="card-icon bg-warning">
                      <i class="fa fa-building-o"></i>
                    </div>

                    <div class="card-right">
                      <h4 class="card-title">Companies</h4>
                      <p class="card-text">1</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                  <div class="card-body">
                    <div class="card-icon bg-danger">
                      <i class="fa fa-suitcase" aria-hidden="true"></i>
                    </div>

                    <div class="card-right">
                      <h4 class="card-title">Leaves</h4>
                      <p class="card-text"><?php echo countTableAll("leave_requests") ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                  <div class="card-body">
                    <div class="card-icon bg-success">
                      <i class="fa fa-money" aria-hidden="true"></i>
                    </div>

                    <div class="card-right">
                      <h4 class="card-title">Salary</h4>
                      <p class="card-text">₦<?php echo number_format($totalEmployeeSalaries) ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 d-flex">
                <div class="card ctm-border-radius shadow-sm flex-fill grow">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0">Total Employees</h4>

                    <a
                      href="<?php echo WEB_URL ?>admin/employees.php"
                      class="float-right btn btn-theme button-1 text-white ctm-border-radius p-2 ctm-btn-padding"
                    >
                      View Employees
                    </a>
                  </div>

                  <div class="card-body">
                    <canvas id="pieChart"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow">
                  <div class="card-header">
                    <h4 class="card-title mb-0">Leave Requests</h4>
                  </div>

                  <div class="card-body">
                    <?php if ($leavesCount > 0): ?>
                      <div class="employee-office-table">
                        <div class="table-responsive">
                          <table class="table custom-table mb-0">
                            <thead>
                              <tr>
                                <th>Employee</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Days</th>
                                <th>Remaining Days</th>
                                <th>Notes</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php foreach ($leaveRequests as $leave): ?>
                                <tr>
                                  <td>
                                    <a href="#" class="avatar">
                                      <img
                                        alt="avatar image"
                                        src="<?php echo WEB_URL ?>img/profiles/user.webp"
                                        class="img-fluid"
                                      />
                                    </a>
                                    
                                    <h2><?php echo ucfirst($leave["firstname"]) . " " . ucfirst($leave["lastname"]) ?></h2>
                                  </td>
                                  <td><?php echo ucfirst($leave["leave_type"]) ?></td>
                                  <td><?php echo $leave["start_date"] ?></td>
                                  <td><?php echo $leave["end_date"] ?></td>
                                  <td><?php echo dateDiff($leave["start_date"], $leave["end_date"]) ?></td>
                                  <td><?php echo dateDiff(date("Y-m-d"), $leave["end_date"]) ?></td>
                                  <td><?php echo $leave["reason"] ?></td>
                                  <td>
                                    <a
                                      href="javascript:void(0)"
                                      class="btn btn-theme ctm-border-radius text-white btn-sm"
                                    >Approve</a>
                                  </td>
                                  <td class="text-right text-danger">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm btn-outline-danger"
                                      data-toggle="modal"
                                      data-target="#delete"
                                    >
                                      <span class="lnr lnr-trash"></span> Decline
                                    </a>
                                  </td>
                                </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <?php else: ?>
                        <h5 class="font-weight-bold">No Employee leave requests</h5>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="card ctm-border-radius shadow-sm grow">
                  <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Today</h4>

                    <button
                      class="float-right btn btn-theme button-1 text-white ctm-border-radius p-2 ctm-btn-padding"
                      data-toggle="modal"
                      data-target="#addNewFaculty"
                    >
                      Add new Faculty <i class="fa fa-plus"></i>
                    </button>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table custom-table mb-0">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Actions</th>
                          </tr>
                        </thead>

                        <tbody id="faculty-info">
                          <?php
                            $faculties = queryTableColumn("faculties");
                            foreach ($faculties as $faculty) {
                          ?>
                            <tr>
                              <td><?php echo ucwords($faculty["faculty_name"]) ?></td>
                              <td>
                                <a
                                  href="javascript:void(0)"
                                  class="btn btn-theme ctm-border-radius text-white btn-sm"
                                >
                                  Edit
                                </a>
                              </td>

                              <td>
                                <a
                                  href="javascript:void(0);"
                                  class="btn btn-sm btn-danger ctm-border-radius"
                                >
                                  Delete
                                </a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-12 d-flex">
                <div class="card flex-fill team-lead shadow-sm grow">
                  <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Team Leads</h4>
                  </div>

                  <div class="card-body">
                    <div class="media mb-3">
                      <div class="e-avatar avatar-online mr-3">
                        <img
                          src="<?php echo WEB_URL ?>img/profiles/img-6.jpg"
                          class="img-fluid"
                          alt="Maria Cotton"
                        />
                      </div>

                      <div class="media-body">
                        <h6 class="m-0">Maria Cotton</h6>
                        <p class="mb-0 ctm-text-sm">PHP</p>
                      </div>
                    </div>

                    <hr />

                    <div class="media mb-3">
                      <div class="e-avatar avatar-online mr-3">
                        <img
                          src="<?php echo WEB_URL ?>img/profiles/img-5.jpg"
                          class="img-fluid"
                          alt="Linda Craver"
                        />
                      </div>

                      <div class="media-body">
                        <h6 class="m-0">Danny Ward</h6>
                        <p class="mb-0 ctm-text-sm">Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-12 d-flex">
                <div class="card recent-acti flex-fill shadow-sm grow">
                  <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">
                      Recent Activities
                    </h4>

                    <a
                      href="javascript:void(0)"
                      class="d-inline-block float-right text-primary"
                    >
                      <i class="lnr lnr-sync"></i>
                    </a>
                  </div>

                  <div class="card-body recent-activ admin-activ">
                    <div class="recent-comment">
                      <div class="notice-board">
                        <div class="table-img">
                          <div class="e-avatar mr-3">
                            <img
                              class="img-fluid"
                              src="<?php echo WEB_URL ?>img/profiles/img-5.jpg"
                              alt="Danny Ward"
                            />
                          </div>
                        </div>

                        <div class="notice-body">
                          <h6 class="mb-0">
                            Lorem ipsum dolor sit amet
                          </h6>

                          <span class="ctm-text-sm">Danny Ward | 1 hour ago</span>
                        </div>
                      </div>

                      <hr />

                      <div class="notice-board">
                        <div class="table-img">
                          <div class="e-avatar mr-3">
                            <img
                              class="img-fluid"
                              src="<?php echo WEB_URL ?>img/profiles/img-2.jpg"
                              alt="John Gibbs"
                            />
                          </div>
                        </div>

                        <div class="notice-body">
                          <h6 class="mb-0">
                            Lorem ipsum dolor sit amet
                          </h6>

                          <span class="ctm-text-sm">John Gibbs | 2 hour ago</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-12 d-flex">
                <div class="card flex-fill today-list shadow-sm grow">
                  <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">
                      Your Upcoming Leave
                    </h4>

                    <a
                      href="#"
                      class="d-inline-block float-right text-primary"
                    >
                      <i class="fa fa-suitcase"></i>
                    </a>
                  </div>

                  <div class="card-body recent-activ">
                    <div class="recent-comment">
                      <a href="javascript:void(0)" class="dash-card text-danger">
                        <div class="dash-card-container">
                          <div class="dash-card-icon">
                            <i class="fa fa-suitcase"></i>
                          </div>

                          <div class="dash-card-content">
                            <h6 class="mb-0">Mon, 16 Dec 2019</h6>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="sidebar-overlay" id="sidebar_overlay"></div>

  <div class="modal fade" id="addNewFaculty">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title mb-3">Create a new Faculty</h4>

          <form action="" id="addFacultyForm">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="faculty"
                name="faculty_name"
                placeholder="Faculty name"
                data-parsley-required-message="Enter the Faculty name"
                required
              />

              <span class="d-block invalid-feedback"></span>
            </div>

            <button
              type="submit"
              class="btn btn-theme button-1 text-white ctm-border-radius float-right"
            >
              Add
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php require_once "../includes/footer.php" ?>

<script src="<?php echo WEB_URL ?>js/chart.min.js"></script>
<script src="<?php echo WEB_URL ?>js/chart.js"></script>
<script>
  $(function() {
    $("#addFacultyForm").parsley();
    $("#addFacultyForm").on("submit", function (e) {
      e.preventDefault();

      if ($("#addFacultyForm").parsley().isValid()) {
        $.ajax({
          url: "src/AddFaculty.php",
          method: "POST",
          data: $(this).serialize(),
          success: function (response) {
            var data = JSON.parse(response);
            let text = "";
            
            if (data.message) {
              $("#faculty").closest(".form-group").children(".invalid-feedback").text(data.message);
              $("#faculty").on("input", function() {
                $("#faculty").closest(".form-group").children(".invalid-feedback").text("");
              })
            }

            if (data.faculties) {
              $("#addFacultyForm").trigger("reset");

              data.faculties.map(result => {
                text += `
                  <tr>
                    <td>${result.faculty_name}</td>
                    <td>
                      <a
                        href="javascript:void(0)"
                        class="btn btn-theme ctm-border-radius text-white btn-sm"
                      >
                        Edit
                      </a>
                    </td>

                    <td>
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-danger ctm-border-radius"
                      >
                        Delete
                      </a>
                    </td>
                  </tr>
                `;
              })

              document.querySelector("#faculty-info").innerHTML = text;
            }
          }
        });
      }
    });
  });
</script>