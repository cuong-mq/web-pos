  <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
              <a class="navbar-brand" href="index.html">
                  <b class="logo-icon ps-2">
                      <img src="images/logo-icon.png" alt="homepage" class="light-logo" width="25" />
                  </b>
                  <span class="logo-text ms-2">
                      <img src="images/logo-text.png" alt="homepage" class="light-logo" />
                  </span>
              </a>
              <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                  <i class="ti-menu ti-close"></i>
              </a>
          </div>
          <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
              <ul class="navbar-nav float-start me-auto">
                  <li class="nav-item d-none d-lg-block">
                      <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                          data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                  </li>
                  <li class="nav-item search-box">
                      <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                          <i class="mdi mdi-magnify fs-4"></i>
                      </a>
                      <form class="app-search position-absolute">
                          <input type="text" class="form-control" placeholder="Search &amp; enter" />
                          <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                      </form>
                  </li>
              </ul>
              <div class="text-end">
                  <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
              </div>
          </div>
      </nav>
  </header>
