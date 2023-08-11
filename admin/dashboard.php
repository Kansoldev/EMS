<?php
  $title = "Admin Dashboard";

  require_once "../config/db.php";
  require_once "../includes/functions.php";
  require_once "../includes/header.php";

  if (!isset($_SESSION["admin"])) {
    header("location: " . WEB_URL . "admin");
  }

  $salaries = queryTableColumn("salaries", "salary");
  $totalEmployeeSalaries = 0;

  foreach ($salaries as $key => $employee) {
    $totalEmployeeSalaries += $employee["salary"];
  }

  $stmt = $pdo->prepare("SELECT * FROM employee_leave el JOIN employees emp ON el.employee_id = emp.id");
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
          <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
            <aside class="sidebar sidebar-user">
              <div class="card ctm-border-radius shadow-sm grow">
                <div class="card-body py-4">
                  <div class="custom-search input-group">
                    <div class="custom-breadcrumb">
                      <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0">
                        <li class="breadcrumb-item d-inline-block">
                          <a href="#" class="text-dark">Home</a>
                        </li>

                        <li class="breadcrumb-item d-inline-block active">
                          Dashboard
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>

              <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                <div class="user-info card-body">
                  <div class="user-avatar mb-4">
                    <img
                      src="<?php echo WEB_URL ?>img/profiles/user.webp"
                      alt="User Avatar"
                      class="img-fluid rounded-circle"
                      width="100"
                    />
                  </div>

                  <div class="user-details">
                    <h4><b>Welcome <?php echo $_SESSION["admin"] ?></b></h4>
                  </div>
                </div>
              </div>

              <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                <div class="card ctm-border-radius shadow-sm border-none grow">
                  <div class="card-body">
                    <div class="row no-gutters">
                      <div class="col-6 align-items-center text-center">
                        <a
                          href="<?php echo WEB_URL ?>admin/dashboard.php"
                          class="text-white active p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"
                        >
                          <span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span>
                          <span>Dashboard</span>
                        </a>
                      </div>

                      <div class="col-6 align-items-center shadow-none text-center">
                        <a
                          href="<?php echo WEB_URL ?>admin/employees.php"
                          class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"
                        >
                          <span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span>
                          <span>Employees</span>
                        </a>
                      </div>

                      <div class="col-6 align-items-center shadow-none text-center">
                        <a
                          href="#"
                          class="text-dark p-4 ctm-border-right ctm-border-left"
                        >
                          <span class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span>
                          <span>Leave</span>
                        </a>
                      </div>
                      
                      <div class="col-6 align-items-center shadow-none text-center">
                        <a
                          href="<?php echo WEB_URL ?>admin/auth/logout.php"
                          class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"
                        >
                          <span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span>
                          <span>Logout</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </aside>
          </div>

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
                      <p class="card-text">1</p>
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
                  <div class="card-header">
                    <h4 class="card-title mb-0">Total Employees</h4>
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
                                  <td><?php echo $leave["start"] ?></td>
                                  <td><?php echo $leave["end"] ?></td>
                                  <td><?php echo dateDiff($leave["start"], $leave["end"]) ?></td>
                                  <td><?php echo dateDiff(date("Y-m-d"), $leave["end"]) ?></td>
                                  <td><?php echo $leave["reason"] ?></td>
                                  <td>
                                    <a
                                      href="javascript:void(0)"
                                      class="btn btn-theme ctm-border-radius text-white btn-sm"
                                    >Approved</a>
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

                    <a
                      href="javascript:void(0)"
                      class="d-inline-block float-right text-primary"
                    >
                      <i class="lnr lnr-sync"></i>
                    </a>
                  </div>

                  <div class="card-body recent-activ">
                    <div class="recent-comment">
                      <a
                        href="javascript:void(0)"
                        class="dash-card text-dark"
                      >
                        <div class="dash-card-container">
                          <div class="dash-card-icon text-primary">
                            <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                          </div>

                          <div class="dash-card-content">
                            <h6 class="mb-0">No Birthdays Today</h6>
                          </div>
                        </div>
                      </a>

                      <hr />

                      <a
                        href="javascript:void(0)"
                        class="dash-card text-dark"
                      >
                        <div class="dash-card-container">
                          <div class="dash-card-icon text-warning">
                            <i class="fa fa-bed" aria-hidden="true"></i>
                          </div>

                          <div class="dash-card-content">
                            <h6 class="mb-0">
                              Ralph Baker is off sick today
                            </h6>
                          </div>

                          <div class="dash-card-avatars">
                            <div class="e-avatar">
                              <img
                                class="img-fluid"
                                src="<?php echo WEB_URL ?>img/profiles/img-9.jpg"
                                alt="Avatar"
                              />
                            </div>
                          </div>
                        </div>
                      </a>
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
<?php require_once "../includes/footer.php" ?>

<script src="<?php echo WEB_URL ?>js/chart.min.js"></script>
<script src="<?php echo WEB_URL ?>js/chart.js"></script>