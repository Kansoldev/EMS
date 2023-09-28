<?php
  $title = "Employee Dashboard";
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

    <div class="inner-wrapper">
      <header class="header">
        <div class="top-header-section">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                <div class="logo my-3 my-sm-0">
                  <a href="<?php echo WEB_URL ?>admin/dashboard.php">
                    <img
                      src="<?php echo WEB_URL ?>img/logo.png"
                      alt="logo"
                      class="img-fluid"
                      width="100"
                    />
                  </a>
                </div>
              </div>

              <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                <div class="user-block d-none d-lg-block">
                  <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="user-info align-right dropdown d-inline-block header-dropdown">
                        <a
                          href="javascript:void(0)"
                          data-toggle="dropdown"
                          class="menu-style dropdown-toggle"
                        >
                          <div class="user-avatar d-inline-block">
                            <img
                              src="<?php echo WEB_URL ?>img/profiles/img-6.jpg"
                              alt="user avatar"
                              class="rounded-circle img-fluid"
                              width="55"
                            />
                          </div>
                        </a>

                        <div
                          class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right"
                        >
                          <a href="#" class="dropdown-item p-2">
                            <span class="media align-items-center">
                              <span class="lnr lnr-user mr-3"></span>
                              <span class="media-body text-truncate">
                                <span class="text-truncate">Profile</span>
                              </span>
                            </span>
                          </a>

                          <a href="#" class="dropdown-item p-2">
                            <span class="media align-items-center">
                              <span class="lnr lnr-cog mr-3"></span>
                              <span class="media-body text-truncate">
                                <span class="text-truncate">Settings</span>
                              </span>
                            </span>
                          </a>

                          <a href="auth/logout.php" class="dropdown-item p-2">
                            <span class="media align-items-center">
                              <span class="lnr lnr-power-switch mr-3"></span>
                              <span class="media-body text-truncate">
                                <span class="text-truncate">Logout</span>
                              </span>
                            </span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-block d-lg-none">
                  <a href="javascript:void(0)">
                    <span
                      id="open_navSidebar"
                      class="lnr lnr-user d-block display-5 text-white"
                    ></span>
                  </a>

                  <div class="offcanvas-menu" id="offcanvas_menu">
                    <span
                      id="close_navSidebar"
                      class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white"
                    ></span>

                    <div class="user-info align-center bg-theme text-center">
                      <a
                        href="javascript:void(0)"
                        class="d-block menu-style text-white"
                      >
                        <div class="user-avatar d-inline-block mr-3">
                          <img
                            src="<?php echo WEB_URL ?>img/profiles/img-6.jpg"
                            alt="user avatar"
                            class="rounded-circle img-fluid"
                            width="55"
                          />
                        </div>
                      </a>
                    </div>

                    <hr />

                    <div class="user-menu-items px-3 m-0">
                      <a href="#" class="px-0 pb-2 pt-0">
                        <span class="media align-items-center">
                          <span class="lnr lnr-home mr-3"></span>
                          <span class="media-body text-truncate text-left">
                            <span class="text-truncate text-left">Dashboard</span>
                          </span>
                        </span>
                      </a>

                      <a href="#" class="p-2">
                        <span class="media align-items-center">
                          <span class="lnr lnr-users mr-3"></span>
                          <span class="media-body text-truncate text-left">
                            <span class="text-truncate text-left">Employees</span>
                          </span>
                        </span>
                      </a>

                      <a href="#" class="p-2">
                        <span class="media align-items-center">
                          <span class="lnr lnr-briefcase mr-3"></span>
                          <span class="media-body text-truncate text-left">
                            <span class="text-truncate text-left">Leave</span>
                          </span>
                        </span>
                      </a>

                      <a href="auth/logout.php" class="p-2">
                        <span class="media align-items-center">
                          <span class="lnr lnr-power-switch mr-3"></span>
                          <span class="media-body text-truncate text-left">
                            <span class="text-truncate text-left">Logout</span>
                          </span>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      <div class="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <?php require_once "includes/sidebar.php" ?>

            <div class="col-xl-9 col-lg-8 col-md-12">
              <div class="row">
                <div class="col-lg-6 col-md-12 d-flex">
                  <div class="card shadow-sm flex-fill grow">
                    <div class="card-header">
                      <h4 class="card-title mb-0 d-inline-block">Permission</h4>

                      <a href="#" class="d-inline-block float-right text-primary">
                        <i class="fa fa-suitcase"></i>
                      </a>
                    </div>

                    <div class="card-body text-center">
                      <div class="time-list">
                        <div class="dash-stats-list">
                          <span class="btn btn-outline-primary">9.00 Hrs</span>
                          <p class="mb-0">Approved</p>
                        </div>

                        <div class="dash-stats-list">
                          <span class="btn btn-outline-primary">10.00 Hrs</span>
                          <p class="mb-0">Remaining</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-md-12 d-flex">
                  <div class="card shadow-sm flex-fill grow">
                    <div class="card-header">
                      <h4 class="card-title mb-0 d-inline-block">Your Leave</h4>

                      <a
                        href="#"
                        class="d-inline-block float-right text-primary"
                      >
                        <i class="fa fa-suitcase"></i>
                      </a>
                    </div>

                    <div class="card-body text-center">
                      <div class="time-list">
                        <div class="dash-stats-list">
                          <span class="btn btn-outline-primary">4 Days</span>
                          <p class="mb-0">Taken</p>
                        </div>

                        <div class="dash-stats-list">
                          <span class="btn btn-outline-primary">7 Days</span>
                          <p class="mb-0">Remaining</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 d-flex">
                  <div class="card shadow-sm flex-fill grow">
                    <div class="card-header">
                      <h4 class="card-title mb-0 d-inline-block">Today</h4>
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

                        <a href="javascript:void(0)" class="dash-card text-dark">
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
                      <a
                        href="#"
                        class="dash-card d-inline-block float-right mb-0 text-primary"
                      >Team Leads</a>
                    </div>

                    <div class="card-body">
                      <div class="media mb-3">
                        <div class="e-avatar avatar-online mr-3">
                          <img
                            src="<?php echo WEB_URL ?>img/profiles/img-6.jpg"
                            alt="Maria Cotton"
                            class="img-fluid"
                          />
                        </div>

                        <div class="media-body">
                          <h6 class="m-0">Maria Cotton</h6>
                          <p class="mb-0 ctm-text-sm">PHP</p>
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
                                src="<?php echo WEB_URL ?>img/profiles/img-6.jpg"
                                alt="Maria Cotton"
                              />
                            </div>
                          </div>

                          <div class="notice-body">
                            <h6 class="mb-0">Lorem ipsum dolor sit amet.</h6>
                            <span class="ctm-text-sm">Maria Cotton | 1 hour ago</span>
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
                        <a
                          href="javascript:void(0)"
                          class="dash-card text-danger"
                        >
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
<?php require_once "includes/footer.php" ?>