<?php require_once "includes/header.php" ?>
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
              <div class="col-md-12">
                <div class="card ctm-border-radius shadow-sm grow">
                  <div class="card-header">
                    <h4 class="card-title mb-0">Apply For a Leave</h4>
                  </div>

                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>
                              Leave Type
                              <span class="text-danger">*</span>
                            </label>

                            <select class="form-control select">
                              <option value="">Select Leave</option>
                              <option value="working from home">Working From Home</option>
                              <option value="sick leave">Sick Leave</option>
                              <option value="parental leave">Parental Leave</option>
                              <option value="annual leave">Annual Leave</option>
                              <option value="normal leave">Normal Leave</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>From</label>
                            <input
                              type="text"
                              class="form-control datetimepicker"
                            />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-6 leave-col">
                          <div class="form-group">
                            <label>To</label>
                            <input
                              type="text"
                              class="form-control datetimepicker"
                            />
                          </div>
                        </div>

                        <div class="col-sm-6 leave-col">
                          <div class="form-group">
                            <label>Remaining Leaves</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder=""
                              disabled
                            />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-6 leave-col">
                          <div class="form-group">
                            <label>Number of Days Leave</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder=""
                              disabled
                            />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group mb-0">
                            <label>Reason</label>
                            <textarea
                              class="form-control"
                              rows="4"
                            ></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="text-center">
                        <a
                          href="javascript:void(0);"
                          class="btn btn-theme button-1 text-white ctm-border-radius mt-4"
                          >Submit Request</a
                        >
                      </div>
                    </form>
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