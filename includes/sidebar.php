<?php
  $path = substr($_SERVER["SCRIPT_NAME"], 5);

  $pages = array(
    array(
      "page" => "dashboard",
      "link" => WEB_URL . "dashboard.php",
      "icon" => "lnr lnr-briefcase"
    ),
    array(
      "page" => "leave",
      "link" => WEB_URL . "leave.php",
      "icon" => "lnr lnr-briefcase"
    ),
    array(
      "page" => "profile",
      "link" => WEB_URL . "employee-profile.php",
      "icon" => "lnr lnr-users"
    ),
    array(
      "page" => "logout",
      "link" => WEB_URL . "auth/logout.php",
      "icon" => "lnr lnr-power-switch"
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
                <a href="#" class="text-dark">Home</a>
              </li>

              <li class="breadcrumb-item d-inline-block active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
      <div class="user-info card-body">
        <div class="user-avatar mb-4">
          <img
            src="<?php echo WEB_URL ?>img/profiles/img-6.jpg"
            alt="User Avatar"
            class="img-fluid rounded-circle"
            width="100"
          />
        </div>

        <div class="user-details">
          <h4><b>Welcome </b></h4>
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
                  href="<?php echo $page["link"] ?>"
                  class="<?php echo strpos($page["link"], $path) ? "active text-white first-slider-btn" : "text-dark second-slider-btn" ?> p-4 ctm-border-right ctm-border-left zctm-border-top"
                >
                  <span class="<?php echo $page["icon"] ?> pr-0 pb-lg-2 font-23"></span>
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