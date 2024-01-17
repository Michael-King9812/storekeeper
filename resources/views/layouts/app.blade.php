<!DOCTYPE html>
<html
  lang="en"
  dir="ltr"
  data-nav-layout="vertical"
  data-theme-mode="light"
  data-header-styles="light"
  data-menu-styles="dark"
  data-toggled="close"
>
  <head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ config('app.name', 'STORE KEEP') }}</title>
    <meta
      name="Description"
      content="Bootstrap Responsive Admin Web Dashboard HTML5 Template"
    />
    <meta name="Author" content="Spruko Technologies Private Limited" />
    <meta
      name="keywords"
      content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit."
    />
    <!-- Favicon -->
    <link
      rel="icon"
      href="{{asset('assets/images/brand-logos/favicon.ico')}}"
      type="image/x-icon"
    />
    <!-- Choices JS -->
    <script src="{{asset('assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
    <!-- Main Theme Js -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- Bootstrap Css -->
    <link
      id="style"
      href="{{asset('assets/libs/bootstrap/css/bootstrap.min.css')}}"
      rel="stylesheet"
    />
    <!-- Style Css -->
    <link href="{{asset('assets/css/styles.min.css')}}" rel="stylesheet" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />
    <!-- Node Waves Css -->
    <link href="{{asset('assets/libs/node-waves/waves.min.css')}}" rel="stylesheet" />
    <!-- Simplebar Css -->
    <link href="{{asset('assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet" />

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" />    
    <link rel="stylesheet" href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/@simonwep/pickr/themes/nano.min.css')}}"> <!-- Choices Css -->
    <link rel="stylesheet" href="{{asset('assets/libs/choices.js/public/assets/styles/choices.min.css"')}}>
    <link rel="stylesheet" href="{{asset('assets/libs/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/quill/quill.bubble.css')}}"> <!-- Filepond CSS -->
    <link rel="stylesheet" href="{{asset('assets/libs/filepond/filepond.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css')}}"> <!-- Date & Time Picker CSS -->
    
    <link
      rel="stylesheet"
      href="{{asset('assets/libs/@simonwep/pickr/themes/nano.min.css')}}"
    />
    <!-- Choices Css -->
    <link
      rel="stylesheet"
      href="{{asset('assets/libs/choices.js/public/assets/styles/choices.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css"
    />
  </head>
  <body>
    <div class="page">
      <!-- app-header -->
      <header class="app-header">
        <!-- Start::main-header-container -->
        <div class="main-header-container container-fluid">
          <!-- Start::header-content-left -->
          <div class="header-content-left">
            <!-- Start::header-element -->
            <div class="header-element">
              <div class="horizontal-logo">
                <a href="index.html" class="header-logo">
                  <img
                    src="{{asset('assets/images/brand-logos/desktop-logo.png')}}"
                    alt="logo"
                    class="desktop-logo"
                  />
                  <img
                    src="{{asset('assets/images/brand-logos/toggle-logo.png')}}"
                    alt="logo"
                    class="toggle-logo"
                  />
                  <img
                    src="{{asset('assets/images/brand-logos/desktop-dark.png')}}"
                    alt="logo"
                    class="desktop-dark"
                  />
                  <img
                    src="{{asset('assets/images/brand-logos/toggle-dark.png')}}"
                    alt="logo"
                    class="toggle-dark"
                  />
                </a>
              </div>
            </div>
            <!-- End::header-element -->
            <!-- Start::header-element -->
            <div class="header-element">
              <!-- Start::header-link -->
              <a
                aria-label="Hide Sidebar"
                class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                data-bs-toggle="sidebar"
                href="javascript:void(0);"
                ><span></span
              ></a>
              <!-- End::header-link -->
            </div>
            <!-- End::header-element -->
          </div>
          <!-- End::header-content-left -->
          <!-- Start::header-content-right -->
          <div class="header-content-right">
            
            <!-- Start::header-element -->
            <div class="header-element notifications-dropdown">
              <!-- Start::header-link|dropdown-toggle -->
              <a
                href="javascript:void(0);"
                class="header-link dropdown-toggle"
                data-bs-toggle="dropdown"
                data-bs-auto-close="outside"
                id="messageDropdown"
                aria-expanded="false"
              >
                <i class="bx bx-bell header-link-icon"></i>
                <span
                  class="badge bg-secondary rounded-pill header-icon-badge pulse pulse-secondary"
                  id="notification-icon-badge"
                  >5</span
                >
              </a>
              <!-- End::header-link|dropdown-toggle -->
              <!-- Start::main-header-dropdown -->
              <div
                class="main-header-dropdown dropdown-menu dropdown-menu-end"
                data-popper-placement="none"
              >
                <div class="p-3">
                  <div
                    class="d-flex align-items-center justify-content-between"
                  >
                    <p class="mb-0 fs-17 fw-semibold">Notifications</p>
                    <span
                      class="badge bg-secondary-transparent"
                      id="notifiation-data"
                      >5 Unread</span
                    >
                  </div>
                </div>
                <div class="dropdown-divider"></div>
                <ul class="list-unstyled mb-0" id="header-notification-scroll">
                  <li class="dropdown-item">
                    <div class="d-flex align-items-start">
                      <div class="pe-2">
                        <span
                          class="avatar avatar-md bg-primary-transparent avatar-rounded"
                          ><i class="ti ti-gift fs-18"></i
                        ></span>
                      </div>
                      <div
                        class="flex-grow-1 d-flex align-items-center justify-content-between"
                      >
                        <div>
                          <p class="mb-0 fw-semibold">
                            <a href="notifications.html"
                              >Your Order Has Been Shipped</a
                            >
                          </p>
                          <span
                            class="text-muted fw-normal fs-12 header-notification-text"
                            >Order No: 123456 Has Shipped To Your Delivery
                            Address</span
                          >
                        </div>
                        <div>
                          <a
                            href="javascript:void(0);"
                            class="min-w-fit-content text-muted me-1 dropdown-item-close1"
                            ><i class="ti ti-x fs-16"></i
                          ></a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown-item">
                    <div class="d-flex align-items-start">
                      <div class="pe-2">
                        <span
                          class="avatar avatar-md bg-secondary-transparent avatar-rounded"
                          ><i class="ti ti-discount-2 fs-18"></i
                        ></span>
                      </div>
                      <div
                        class="flex-grow-1 d-flex align-items-center justify-content-between"
                      >
                        <div>
                          <p class="mb-0 fw-semibold">
                            <a href="notifications.html">Discount Available</a>
                          </p>
                          <span
                            class="text-muted fw-normal fs-12 header-notification-text"
                            >Discount Available On Selected Products</span
                          >
                        </div>
                        <div>
                          <a
                            href="javascript:void(0);"
                            class="min-w-fit-content text-muted me-1 dropdown-item-close1"
                            ><i class="ti ti-x fs-16"></i
                          ></a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown-item">
                    <div class="d-flex align-items-start">
                      <div class="pe-2">
                        <span
                          class="avatar avatar-md bg-pink-transparent avatar-rounded"
                          ><i class="ti ti-user-check fs-18"></i
                        ></span>
                      </div>
                      <div
                        class="flex-grow-1 d-flex align-items-center justify-content-between"
                      >
                        <div>
                          <p class="mb-0 fw-semibold">
                            <a href="notifications.html"
                              >Account Has Been Verified</a
                            >
                          </p>
                          <span
                            class="text-muted fw-normal fs-12 header-notification-text"
                            >Your Account Has Been Verified Sucessfully</span
                          >
                        </div>
                        <div>
                          <a
                            href="javascript:void(0);"
                            class="min-w-fit-content text-muted me-1 dropdown-item-close1"
                            ><i class="ti ti-x fs-16"></i
                          ></a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown-item">
                    <div class="d-flex align-items-start">
                      <div class="pe-2">
                        <span
                          class="avatar avatar-md bg-warning-transparent avatar-rounded"
                          ><i class="ti ti-circle-check fs-18"></i
                        ></span>
                      </div>
                      <div
                        class="flex-grow-1 d-flex align-items-center justify-content-between"
                      >
                        <div>
                          <p class="mb-0 fw-semibold">
                            <a href="notifications.html"
                              >Order Placed
                              <span class="text-warning">ID: #1116773</span></a
                            >
                          </p>
                          <span
                            class="text-muted fw-normal fs-12 header-notification-text"
                            >Order Placed Successfully</span
                          >
                        </div>
                        <div>
                          <a
                            href="javascript:void(0);"
                            class="min-w-fit-content text-muted me-1 dropdown-item-close1"
                            ><i class="ti ti-x fs-16"></i
                          ></a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown-item">
                    <div class="d-flex align-items-start">
                      <div class="pe-2">
                        <span
                          class="avatar avatar-md bg-success-transparent avatar-rounded"
                          ><i class="ti ti-clock fs-18"></i
                        ></span>
                      </div>
                      <div
                        class="flex-grow-1 d-flex align-items-center justify-content-between"
                      >
                        <div>
                          <p class="mb-0 fw-semibold">
                            <a href="notifications.html"
                              >Order Delayed
                              <span class="text-success">ID: 7731116</span></a
                            >
                          </p>
                          <span
                            class="text-muted fw-normal fs-12 header-notification-text"
                            >Order Delayed Unfortunately</span
                          >
                        </div>
                        <div>
                          <a
                            href="javascript:void(0);"
                            class="min-w-fit-content text-muted me-1 dropdown-item-close1"
                            ><i class="ti ti-x fs-16"></i
                          ></a>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="p-3 empty-header-item1 border-top">
                  <div class="d-grid">
                    <a href="notifications.html" class="btn btn-primary"
                      >View All</a
                    >
                  </div>
                </div>
                <div class="p-5 empty-item1 d-none">
                  <div class="text-center">
                    <span
                      class="avatar avatar-xl avatar-rounded bg-secondary-transparent"
                    >
                      <i class="ri-notification-off-line fs-2"></i>
                    </span>
                    <h6 class="fw-semibold mt-3">No New Notifications</h6>
                  </div>
                </div>
              </div>
              <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->
            <!-- Start::header-element -->
            <div class="header-element">
              <!-- Start::header-link|dropdown-toggle -->
              <a
                href="#"
                class="header-link dropdown-toggle"
                id="mainHeaderProfile"
                data-bs-toggle="dropdown"
                data-bs-auto-close="outside"
                aria-expanded="false"
              >
                <div class="d-flex align-items-center">
                  <div class="me-sm-2 me-0">
                    <img
                      src="{{asset('assets/images/faces/9.jpg')}}"
                      alt="img"
                      width="32"
                      height="32"
                      class="rounded-circle"
                    />
                  </div>
                  <div class="d-sm-block d-none">
                    <p class="fw-semibold mb-0 lh-1">Json Taylor</p>
                    <span class="op-7 fw-normal d-block fs-11"
                      >Web Designer</span
                    >
                  </div>
                </div>
              </a>
              <!-- End::header-link|dropdown-toggle -->
              <ul
                class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                aria-labelledby="mainHeaderProfile"
              >
                <li>
                  <a class="dropdown-item d-flex" href="profile.html"
                    ><i class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a
                  >
                </li>
                <li>
                  <a class="dropdown-item d-flex" href="mail.html"
                    ><i class="ti ti-inbox fs-18 me-2 op-7"></i>Inbox
                    <span class="badge bg-success-transparent ms-auto"
                      >25</span
                    ></a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item d-flex border-block-end"
                    href="to-do-list.html"
                    ><i class="ti ti-clipboard-check fs-18 me-2 op-7"></i>Task
                    Manager</a
                  >
                </li>
                <li>
                  <a class="dropdown-item d-flex" href="mail-settings.html"
                    ><i class="ti ti-adjustments-horizontal fs-18 me-2 op-7"></i
                    >Settings</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item d-flex border-block-end"
                    href="javascript:void(0);"
                    ><i class="ti ti-wallet fs-18 me-2 op-7"></i>Bal:
                    $7,12,950</a
                  >
                </li>
                <li>
                  <a class="dropdown-item d-flex" href="chat.html"
                    ><i class="ti ti-headset fs-18 me-2 op-7"></i>Support</a
                  >
                </li>
                <li>
                  <a class="dropdown-item d-flex" href="sign-in-cover.html"
                    ><i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out</a
                  >
                </li>
              </ul>
            </div>
            <!-- End::header-element -->
           
          </div>
          <!-- End::header-content-right -->
        </div>
        <!-- End::main-header-container -->
      </header>
      <!-- /app-header -->
      <!-- Start::app-sidebar -->
      <aside class="app-sidebar sticky" id="sidebar">
        <!-- Start::main-sidebar-header -->
        <div class="main-sidebar-header">
          <a href="index.html" class="header-logo">
            <!-- <img
              src="{{asset('assets/images/brand-logos/desktop-logo.png')}}"
              alt="logo"
              class="desktop-logo"
            /> -->
            <!-- <img
              src="{{asset('assets/images/brand-logos/toggle-logo.png')}}"
              alt="logo"
              class="toggle-logo"
            />
            <img
              src="{{asset('assets/images/brand-logos/desktop-dark.png')}}"
              alt="logo"
              class="desktop-dark"
            />
            <img
              src="{{asset('assets/images/brand-logos/toggle-dark.png')}}"
              alt="logo"
              class="toggle-dark"
            /> -->
            <h4 style="font-weight: bold; color: white;">STORE KEEPER</h4>
          </a>
        </div>
        <!-- End::main-sidebar-header -->
        <!-- Start::main-sidebar -->
        <div class="main-sidebar" id="sidebar-scroll">
          <!-- Start::nav -->
          <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="#7b8191"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <path
                  d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"
                ></path>
              </svg>
            </div>
            <ul class="main-menu">
              <!-- Start::slide__category -->
              <li class="slide__category">
                <span class="category-name">Main</span>
              </li>
              <!-- End::slide__category -->
              <!-- Start::slide -->
              <li class="slide">
                <a href="{{ route('dashboard') }}" class="side-menu__item">
                  <i class="bx bx-home side-menu__icon"></i>
                  <span class="side-menu__label">Home</span>
                </a>
              </li>
              <!-- End::slide -->
              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                  <i class="bx bx-store-alt side-menu__icon"></i>
                  <span class="side-menu__label"
                    >Items Type</span
                  >
                  <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="javascript:void(0)">Items Type</a>
                  </li>
                  <li class="slide">
                    <a href="{{ route('itemType.manage') }}" class="side-menu__item">Manage Items</a>
                  </li>             
                </ul>
              </li>
              <!-- End::slide -->
              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                  <i class="bx bx-store-alt side-menu__icon"></i>
                  <span class="side-menu__label"
                    >Items</span
                  >
                  <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="javascript:void(0)">Items</a>
                  </li>
                  <li class="slide">
                    <a href="{{ route('item.manage') }}" class="side-menu__item">Manage Items</a>
                  </li>               
                </ul>
              </li>
              <!-- End::slide -->
              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                  <i class="bx bx-store-alt side-menu__icon"></i>
                  <span class="side-menu__label"
                    >Stocks</span
                  >
                  <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="javascript:void(0)">Stocks</a>
                  </li>
                  <li class="slide">
                    <a href="{{ route('stock.manage') }}" class="side-menu__item">Manage Stocks</a>
                  </li>               
                </ul>
              </li>
              <!-- End::slide -->
              
              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                  <i class="bx bx-store-alt side-menu__icon"></i>
                  <span class="side-menu__label"
                    >Stock Puchase</span
                  >
                  <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="javascript:void(0)">Stock Puchase</a>
                  </li>
                  <li class="slide">
                    <a href="{{ route('stockPurchase.manage') }}" class="side-menu__item">Manage Stock Purchase</a>
                  </li>               
                </ul>
              </li>
              <!-- End::slide -->
              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                  <i class="bx bx-store-alt side-menu__icon"></i>
                  <span class="side-menu__label"
                    >Bar Stocks</span
                  >
                  <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="javascript:void(0)">Bar Stocks</a>
                  </li>
                  <li class="slide">
                    <a href="{{ route('barStock.manage') }}" class="side-menu__item">Manage Stock Purchase</a>
                  </li>               
                </ul>
              </li>
              <!-- End::slide -->
             
            </ul>
            <div class="slide-right" id="slide-right">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="#7b8191"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <path
                  d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"
                ></path>
              </svg>
            </div>
          </nav>
          <!-- End::nav -->
        </div>
        <!-- End::main-sidebar -->
      </aside>
      <!-- End::app-sidebar -->
      <!-- Start::app-content -->
      
        @yield('content')

      <!-- End::app-content -->
      <div
        class="modal fade"
        id="searchModal"
        tabindex="-1"
        aria-labelledby="searchModal"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="input-group">
                <a
                  href="javascript:void(0);"
                  class="input-group-text"
                  id="Search-Grid"
                  ><i class="fe fe-search header-link-icon fs-18"></i
                ></a>
                <input
                  type="search"
                  class="form-control border-0 px-2"
                  placeholder="Search"
                  aria-label="Username"
                />
                <a
                  href="javascript:void(0);"
                  class="input-group-text"
                  id="voice-search"
                  ><i class="fe fe-mic header-link-icon"></i
                ></a>
                <a
                  href="javascript:void(0);"
                  class="btn btn-light btn-icon"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="fe fe-more-vertical"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                  <li><hr class="dropdown-divider" /></li>
                  <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
              </div>
              <div class="mt-4">
                <p class="font-weight-semibold text-muted mb-2">
                  Are You Looking For...
                </p>
                <span class="search-tags"
                  ><i class="fe fe-user me-2"></i>People<a
                    href="javascript:void(0)"
                    class="tag-addon"
                    ><i class="fe fe-x"></i></a
                ></span>
                <span class="search-tags"
                  ><i class="fe fe-file-text me-2"></i>Pages<a
                    href="javascript:void(0)"
                    class="tag-addon"
                    ><i class="fe fe-x"></i></a
                ></span>
                <span class="search-tags"
                  ><i class="fe fe-align-left me-2"></i>Articles<a
                    href="javascript:void(0)"
                    class="tag-addon"
                    ><i class="fe fe-x"></i></a
                ></span>
                <span class="search-tags"
                  ><i class="fe fe-server me-2"></i>Tags<a
                    href="javascript:void(0)"
                    class="tag-addon"
                    ><i class="fe fe-x"></i></a
                ></span>
              </div>
              <div class="my-4">
                <p class="font-weight-semibold text-muted mb-2">
                  Recent Search :
                </p>
                <div
                  class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert"
                >
                  <a href="notifications.html"><span>Notifications</span></a>
                  <a
                    class="ms-auto lh-1"
                    href="javascript:void(0);"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                    ><i class="fe fe-x text-muted"></i
                  ></a>
                </div>
                <div
                  class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert"
                >
                  <a href="alerts.html"><span>Alerts</span></a>
                  <a
                    class="ms-auto lh-1"
                    href="javascript:void(0);"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                    ><i class="fe fe-x text-muted"></i
                  ></a>
                </div>
                <div
                  class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert"
                >
                  <a href="mail.html"><span>Mail</span></a>
                  <a
                    class="ms-auto lh-1"
                    href="javascript:void(0);"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                    ><i class="fe fe-x text-muted"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="btn-group ms-auto">
                <button class="btn btn-sm btn-primary-light">Search</button>
                <button class="btn btn-sm btn-primary">Clear Recents</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer Start -->
      <footer class="footer mt-auto py-3 bg-white text-center">
        <div class="container">
          <span class="text-muted">
            Copyright © <span id="year"></span>
            <a href="javascript:void(0);" class="text-dark fw-semibold">{{ config('app.name', 'STORE KEEP') }}</a
            >. Designed by
            <a href="javascript:void(0);">
              <span class="fw-semibold text-primary text-decoration-underline"
                >IMOH TECHNOLOGIES</span
              >
            </a>
            All rights reserved
          </span>
        </div>
      </footer>
      <!-- Footer End -->
    </div>
    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    ></script>
    <div class="scrollToTop">
      <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Popper JS -->
    <script src="{{asset('assets/libs/@popperjs/core/umd/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Defaultmenu JS -->
    <script src="{{asset('assets/js/defaultmenu.min.js')}}"></script>
    <!-- Node Waves JS-->
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <!-- Sticky JS -->
    <script src="{{asset('assets/js/sticky.js')}}"></script>
    <!-- Simplebar JS -->
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/simplebar.js')}}"></script>
    <!-- Color Picker JS -->
    <script src="{{asset('assets/libs/@simonwep/pickr/pickr.es5.min.js')}}"></script>
    <!-- Custom-Switcher JS -->
    <script src="{{asset('assets/js/custom-switcher.min.js')}}"></script>
    <!-- Jquery Cdn -->

    <!-- Date & Time Picker JS -->
    <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script> <!-- Quill Editor JS -->
    <script src="{{asset('assets/libs/quill/quill.min.js')}}"></script> <!-- Filepond JS -->
    <script src="{{asset('assets/libs/filepond/filepond.min.js')}}"></script>
    <script src="{{asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
    <script src="{{asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')}}"></script>
    <script src="{{asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script>
    <script src="{{asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js')}}"></script>
    <script src="{{asset('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js')}}"></script>
    <script src="{{asset('assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js')}}"></script>
    <script src="{{asset('assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')}}"></script>
    <script src="{{asset('assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js')}}"></script>
    <script src="{{asset('assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js')}}"></script> <!-- Internal Add Products JS -->
    <script src="{{asset('assets/js/add-products.js')}}"></script> <!-- Custom JS -->

    <!-- Datatables Cdn -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <!-- Internal Datatables JS -->
    <script src="{{asset('assets/js/datatables.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
  </body>
</html>
