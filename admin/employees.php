<?php
  session_start();

  $title = "EMS | Employees";

  require_once "../includes/header.php";
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

    <?php require_once "../includes/topHeader.php" ?>

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
                          Employees
                        </li>
                      </ol>
                    </div>
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
                          class="text-dark p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"
                        >
                          <span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span>
                          <span>Dashboard</span>
                        </a>
                      </div>

                      <div class="col-6 align-items-center shadow-none text-center">
                        <a
                          href="<?php echo WEB_URL ?>admin/employees.php"
                          class="text-white active p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"
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
            <div class="card shadow-sm grow ctm-border-radius">
              <div class="card-body align-center">
                <h4 class="card-title float-left mb-0 mt-2">2 People</h4>

                <ul class="nav nav-tabs float-right border-0 tab-list-emp">
                  <li class="nav-item pl-3">
                    <a
                      href="#"
                      class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"
                    >
                      <i class="fa fa-plus"></i>&nbsp;&nbsp;Add Person
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="ctm-border-radius shadow-sm grow card">
              <div class="card-body">
                <div class="row people-grid-row">
                  <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile">
                      <div class="card-body">
                        <div class="pro-widget-content text-center">
                          <div class="profile-info-widget">
                            <a href="#" class="booking-doc-img">
                              <img
                                src="<?php echo WEB_URL ?>img/profiles/img-9.jpg"
                                alt="User Image"
                              />
                            </a>

                            <div class="profile-det-info">
                              <h4>
                                <a href="#" class="text-primary">Maria Cotton</a>
                              </h4>

                              <div>
                                <p class="mb-0"><b>PHP Team Lead</b></p>
                                <p class="mb-0 ctm-text-sm">mariacotton@gmail.com</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile">
                      <div class="card-body">
                        <div class="pro-widget-content text-center">
                          <div class="profile-info-widget">
                            <a href="#" class="booking-doc-img">
                              <img
                                src="<?php echo WEB_URL ?>img/profiles/img-6.jpg"
                                alt="User Image"
                              />
                            </a>

                            <div class="profile-det-info">
                              <h4>
                                <a href="#" class="text-primary">John Doe</a>
                              </h4>

                              <div>
                                <p class="mb-0"><b>PHP Team Lead</b></p>
                                <p class="mb-0 ctm-text-sm">johndoe@gmail.com</p>
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
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php require_once "../includes/footer.php" ?>
