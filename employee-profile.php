<?php
  $title = "Employee Profile";
  require_once "includes/header.php";
  require_once "includes/functions.php";
   
  // $select_employee_stmt
  $selectEmployeeStmt = $pdo->prepare("SELECT * FROM employees emp JOIN employee_credentials ec ON emp.id = ec.employee_id JOIN departments ON emp.department_id = departments.id WHERE emp.id = :eid");
  $selectEmployeeStmt->bindValue(":eid", $_SESSION["employee_id"]);
  $selectEmployeeStmt->execute();
  $employee = $selectEmployeeStmt->fetch();

  $selectFacultyStmt = $pdo->prepare("SELECT faculty_name FROM faculties WHERE id = :id");
  $selectFacultyStmt->bindValue(":id", $employee["faculty_id"]);
  $selectFacultyStmt->execute();
  $facultyInfo = $selectFacultyStmt->fetch();
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
              <?php require_once "includes/profileNav.php" ?>

              <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                  <div class="card flex-fill ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Basic Information</h4>
                    </div>

                    <div class="card-body">
                      <p class="card-text mb-3">
                        <span class="text-primary">First Name: </span> <?php echo ucfirst($employee["firstname"]) ?>
                      </p>

                      <p class="card-text mb-3">
                        <span class="text-primary">Last Name: </span> <?php echo ucfirst($employee["lastname"]) ?>
                      </p>

                      <p class="card-text mb-3">
                        <span class="text-primary">Job Title: </span> <?php echo ucwords($employee["job_title"]) ?>
                      </p>

                      <p class="card-text mb-3">
                        <span class="text-primary">Gender: </span><?php echo ucfirst($employee["gender"]) ?>
                      </p>

                      <p class="card-text mb-3">
                        <span class="text-primary">DOB: </span><?php echo $employee["dob"] ?>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                  <div class="card flex-fill ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Contact</h4>
                    </div>

                    <div class="card-body">
                      <p class="card-text mb-3">
                        <span class="text-primary">Email: </span> <?php echo $employee["email"] ?>
                      </p>

                      <p class="card-text mb-3">
                        <span class="text-primary">Phone Number: </span> <?php echo ucfirst($employee["phone_number"]) ?>
                      </p>

                      <p class="card-text mb-3">
                        <span class="text-primary">Residential Address : </span><?php echo $employee["address"] ?>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                  <div class="card flex-fill ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                      <h4 class="card-title mb-0">School Info</h4>
                    </div>

                    <div class="card-body">
                      <p class="card-text mb-3">
                        <span class="text-primary">Faculty: </span> <?php echo ucwords($facultyInfo["faculty_name"]) ?>
                      </p>

                      <p class="card-text mb-3">
                        <span class="text-primary">Department: </span> <?php echo ucwords($employee["department_name"]) ?>
                      </p>
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
<?php require_once "includes/footer.php" ?>