<?php
  $path = substr($_SERVER["SCRIPT_NAME"], 11);

  switch ($path) {
    case "employees.php":
      $breadcrumb = "Employees";
      break;

    default:
      $breadcrumb = "Dashboard";
  }

  $pages = array(
    array(
      "page" => "Dashboard",
      "link" => "admin/dashboard.php",
      "icon" => "lnr-briefcase"
    ),
    array(
      "page" => "Employees",
      "link" => "admin/employees.php",
      "icon" => "lnr-users"
    ),
    array(
      "page" => "Leaves",
      "link" => "#",
      "icon" => "lnr-briefcase"
    ),
    array(
      "page" => "logout",
      "link" => "admin/auth/logout.php",
      "icon" => "lnr-power-switch"
    )
  );
?>

<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
  <aside class="sidebar sidebar-user">
    <div class="card ctm-border-radius shadow-sm grow">
      <div class="card-body py-4">
        <div class="custom-search input-group">
          <div class="custom-breadcrumb">
            <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0">
              <li class="breadcrumb-item d-inline-block">
                <a href="javascript:void(0)" class="text-dark">Home</a>
              </li>

              <li class="breadcrumb-item d-inline-block active"><?php echo $breadcrumb ?></li>
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
            <?php foreach ($pages as $page): ?>
              <div class="col-6 align-items-center text-center">
                <a
                  href="<?php echo WEB_URL . $page["link"] ?>"
                  class="<?php echo strpos($page["link"], $path) ? "active text-white first-slider-btn" : "text-dark second-slider-btn" ?> p-4 ctm-border-right ctm-border-left ctm-border-top"
                >
                  <span class="lnr <?php echo $page["icon"] ?> pr-0 pb-lg-2 font-23"></span>
                  <span><?php echo ucwords($page["page"]) ?></span>
                </a>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </aside>
</div>