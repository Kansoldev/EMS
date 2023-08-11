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
                                                src="<?php echo WEB_URL ?>img/profiles/user.webp"
                                                alt="user avatar"
                                                class="rounded-circle img-fluid"
                                                width="55"
                                            />
                                        </div>
                                    </a>

                                    <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
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
                                            src="<?php echo WEB_URL ?>img/profiles/user.webp"
                                            alt="user avatar"
                                            class="rounded-circle img-fluid"
                                            width="55"
                                        />
                                    </div>
                                </a>
                            </div>

                            <hr />

                            <div class="user-menu-items px-3 m-0">
                                <a href="<?php echo WEB_URL ?>admin/dashboard.php" class="px-0 pb-2 pt-0">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-home mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Dashboard</span>
                                        </span>
                                    </span>
                                </a>

                                <a href="<?php echo WEB_URL ?>admin/employees.php" class="p-2">
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