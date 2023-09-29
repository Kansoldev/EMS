<?php
  $title = "Employees";
  require_once "../includes/header.php";
  require_once "../includes/functions.php";

  $sql = $pdo->prepare("SELECT * FROM employees emp JOIN employee_credentials ec ON emp.id = ec.employee_id");
  $sql->execute();
  $employees = $sql->fetchAll();
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
            <div class="card shadow-sm grow ctm-border-radius">
              <div class="card-body align-center">
                <h4 class="card-title float-left mb-0 mt-2"><?php echo countTableAll("employees") ?> Employees</h4>

                <ul class="nav nav-tabs float-right border-0 tab-list-emp">
                  <li class="nav-item pl-3">
                    <a
                      href="#"
                      class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"
                    >
                      <i class="fa fa-plus"></i>&nbsp;&nbsp;Add Employee
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="ctm-border-radius shadow-sm grow card">
              <div class="card-body">
                <div class="row people-grid-row">
                  <?php foreach ($employees as $key => $employee): ?>
                    <div class="col-md-6 col-lg-6 col-xl-4">
                      <div class="card widget-profile">
                        <div class="card-body">
                          <div class="pro-widget-content text-center">
                            <div class="profile-info-widget">
                              <div class="booking-doc-img">
                                <img
                                  src="<?php echo WEB_URL ?>img/profiles/user.webp"
                                  alt="Staff image"
                                />
                              </div>

                              <div class="profile-det-info">
                                <h4>
                                  <a href="<?php echo WEB_URL ?>admin/employee-profile.php" class="text-primary"><?php echo $employee["firstname"] . " " . $employee["lastname"] ?></a>
                                </h4>

                                <div>
                                  <p class="mb-0"><b><?php echo $employee["job_title"] ?></b></p>
                                  <p class="mb-0 ctm-text-sm"><?php echo $employee["email"] ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
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
