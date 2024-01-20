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
      <title>{{ config('app.name', 'STORE KIPPA') }}</title>
      <meta
         name="Description"
         content="Bootstrap Responsive Admin Web Dashboard HTML5 Template"
         />
      <meta name="Author" content="Oxygyn Labs" />
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
      <link rel="stylesheet" href="{{asset('assets/libs/@simonwep/pickr/themes/nano.min.css')}}">
      <!-- Choices Css -->
      <link rel="stylesheet" href="{{asset('assets/libs/choices.js/public/assets/styles/choices.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/libs/quill/quill.snow.css')}}">
      <link rel="stylesheet" href="{{asset('assets/libs/quill/quill.bubble.css')}}">
      <!-- Filepond CSS -->
      <link rel="stylesheet" href="{{asset('assets/libs/filepond/filepond.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css')}}">
      <!-- Date & Time Picker CSS -->
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

      @yield('custom-css');

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
                           <h4 style="font-weight: bold; color: white; font-size:16px">STORE KIPPA</h4>
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
                                 src="{{asset('assets/images/21.jpg')}}"
                                 alt="img"
                                 width="32"
                                 height="32"
                                 class="rounded-circle"
                                 />
                           </div>
                           <div class="d-sm-block d-none">
                              <p class="fw-semibold mb-0 lh-1">{{ auth()->user()->firstName() }}</p>
                              <span class="op-7 fw-normal d-block fs-11">{{ auth()->user()->role() }}</span>
                           </div>
                        </div>
                     </a>
                     <!-- End::header-link|dropdown-toggle -->
                     <ul
                        class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                        aria-labelledby="mainHeaderProfile"
                        >
                        
                        <li>
                           <a class="dropdown-item d-flex" href="#"
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
                  <h4 style="font-weight: bold; color: white; font-size:16px">STORE KIPPA</h4>
               </a>
            </div>
            <!-- End::main-sidebar-header -->
            @include('layouts.navigation')
         </aside>
         <!-- End::app-sidebar -->
         <!-- Start::app-content -->
         @yield('content')
        

         <!-- Footer Start -->
         <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
               <span class="text-muted">
               Copyright © <span id="year"></span>
               <a href="javascript:void(0);" class="text-dark fw-semibold">{{ config('app.name', 'STORE KIPPA') }}</a
                  >. Designed & Maintained by
               <a href="javascript:void(0);">
               <span class="fw-semibold text-primary text-decoration-underline"
                  >Oxygyn Labs</span
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
      <script src="{{asset('assets/js/add-products.js')}}"></script> 
      <script src="{{asset('assets/js/choices.js')}}"></script>
      <script src="{{asset('assets/js/custom.js')}}"></script>
      <script src="{{asset('assets/js/general.js')}}"></script>

      @yield('custom-js')

   </body>
</html>
