@php
    $menuAcitve ??= "";
@endphp
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="/assets/main.css" rel="stylesheet">
  </head>
  <body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <div class="app-header header-shadow">
        <div class="app-header__logo">
          <div class="logo-src"></div>
          <div class="header__pane ml-auto">
            <div>
              <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
              <span class="hamburger-box">
              <span class="hamburger-inner"></span>
              </span>
              </button>
            </div>
          </div>
        </div>
        <div class="app-header__mobile-menu">
          <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
            <span class="hamburger-inner"></span>
            </span>
            </button>
          </div>
        </div>
        <div class="app-header__menu">
          <span>
          <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
          <span class="btn-icon-wrapper">
          <i class="fa fa-ellipsis-v fa-w-6"></i>
          </span>
          </button>
          </span>
        </div>
        <div class="app-header__content">
          {{-- <div class="app-header-left">
            <div class="search-wrapper">
              <div class="input-holder">
                <input type="text" class="search-input" placeholder="Type to search">
                <button class="search-icon"><span></span></button>
              </div>
              <button class="close"></button>
            </div>
            <ul class="header-menu nav">
              <li class="nav-item">
                <a href="javascript:void(0);" class="nav-link">
                <i class="nav-link-icon fa fa-database"> </i>
                Statistics
                </a>
              </li>
              <li class="btn-group nav-item">
                <a href="javascript:void(0);" class="nav-link">
                <i class="nav-link-icon fa fa-edit"></i>
                Projects
                </a>
              </li>
              <li class="dropdown nav-item">
                <a href="javascript:void(0);" class="nav-link">
                <i class="nav-link-icon fa fa-cog"></i>
                Settings
                </a>
              </li>
            </ul>
          </div>
          <div class="app-header-right">
            <div class="header-btn-lg pr-0">
              <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                  <div class="widget-content-left">
                    <div class="btn-group">
                      <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                      <img width="42" class="rounded-circle" src="/assets/1.jpg" alt>
                      <i class="fa fa-angle-down ml-2 opacity-8"></i>
                      </a>
                      <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                        <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                        <h6 tabindex="-1" class="dropdown-header">Header</h6>
                        <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                        <div tabindex="-1" class="dropdown-divider"></div>
                        <button type="button" tabindex="0" class="dropdown-item">Dividers</button>
                      </div>
                    </div>
                  </div>
                  <div class="widget-content-left  ml-3 header-user-info">
                    <div class="widget-heading">
                      Alina Mclourd
                    </div>
                    <div class="widget-subheading">
                      VP People Manager
                    </div>
                  </div>
                  <div class="widget-content-right header-user-info ml-3">
                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                    <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
      <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
          <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
              <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                <span class="hamburger-inner"></span>
                </span>
                </button>
              </div>
            </div>
          </div>
          <div class="app-header__mobile-menu">
            <div>
              <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
              <span class="hamburger-box">
              <span class="hamburger-inner"></span>
              </span>
              </button>
            </div>
          </div>
          <div class="app-header__menu">
            <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
            <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
            </button>
            </span>
          </div>
          <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
              <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                  <a href="/crawler" class="@if($menuAcitve == "crawler") mm-active @endif">
                  <i class="metismenu-icon pe-7s-box2"></i>
                  Đăng ký sản phẩm
                  </a>
                </li>
                <li class="app-sidebar__heading">Cài đặt</li>
                <li>
                  <a href="/setting" class="@if($menuAcitve == "setting") mm-active @endif">
                  <i class="metismenu-icon pe-7s-note2"></i>
                  Mô tả sản phẩm
                  </a>
                </li>
                <li>
                  <a href="/setting-temu" class="@if($menuAcitve == "temu") mm-active @endif">
                  <i class="metismenu-icon pe-7s-settings"></i>
                  Temu
                  </a>
                </li>
                <li class="app-sidebar__heading">User</li>
                <li>
                  <a href="/" class="@if($menuAcitve == "account") mm-active @endif">
                  <i class="metismenu-icon pe-7s-users"></i>
                  Tài khoản
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="app-main__outer">
          <div class="app-main__inner">
            <div class="app-page-title">
              <div class="page-title-wrapper">
                <div class="page-title-heading">
                  <div class="page-title-icon">
                    @yield('header-icon')
                  </div>
                  <div>
                    @yield('header-title')
                  </div>
                </div>
                <div class="page-title-actions">
                  @yield('header-actions')
                </div>
              </div>
            </div>

            @yield('content')

          </div>
          <div class="app-wrapper-footer">
            <div class="app-footer">
              <div class="app-footer__inner">
                <div class="app-footer-left">
                  <ul class="nav">
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link">
                      Footer Link 1
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link">
                      Footer Link 2
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="app-footer-right">
                  <ul class="nav">
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link">
                      Footer Link 3
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link">
                        <div class="badge badge-success mr-1 ml-0">
                          <small>NEW</small>
                        </div>
                        Footer Link 4
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="/assets/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @yield('js')
  </body>
</html>