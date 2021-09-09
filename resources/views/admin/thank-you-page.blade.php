<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Checkout | EZStore - Responsive HTML5 Template</title>
      <meta name="author" content="Moin Abbas">
      <!-- Favicon -->
      @include('admin.layout.favicon')
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
      <!-- Web Fonts  -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
      <!-- Vendor CSS -->
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/vendor/bootstrap/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/vendor/fontawesome-free/css/all.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/vendor/animate/animate.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/vendor/magnific-popup/magnific-popup.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/vendor/bootstrap-star-rating/css/star-rating.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css')}}">
      <!-- shop page header  -->
      <link rel="stylesheet" href="http://webeasyhost.com/cannon/public/front/nicepage.css" media="screen">
      <link rel="stylesheet" href="http://webeasyhost.com/cannon/public/front/Home.css" media="screen">
      <script class="u-script" type="text/javascript" src="http://webeasyhost.com/cannon/public/front/jquery.js" defer=""></script>
      <script class="u-script" type="text/javascript" src="http://webeasyhost.com/cannon/public/front/nicepage.js" defer=""></script>
      <!-- Theme CSS -->
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/css/theme.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/css/theme-elements.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/css/theme-blog.css')}}">
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/css/theme-shop.css')}}">
      <!-- Demo CSS -->
      <!-- Skin CSS -->
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/css/skins/default.css')}}">
      <!-- Theme Custom CSS -->
      <link rel="stylesheet" href="{{asset('public/front/cart_resources/css/custom.css')}}">
      <!-- Head Libs -->
      <script src="{{asset('public/front/cart_resources/vendor/modernizr/modernizr.min.js')}}"></script>
   </head>
   <body>
      <div class="body">
         <header class="u-clearfix u-header" id="sec-4cab">
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
               <a href="http://webeasyhost.com/cannon" class="u-image u-logo u-image-1">
               <img src="http://webeasyhost.com/cannon/public/theme/default-logo.png" class="u-logo-image u-logo-image-1">
               </a>
               <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
                  <div class="menu-collapse">
                     <a class="u-button-style u-nav-link" href="#">
                        <svg>
                           <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                        </svg>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                           <defs>
                              <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                                 <rect y="1" width="16" height="2"></rect>
                                 <rect y="7" width="16" height="2"></rect>
                                 <rect y="13" width="16" height="2"></rect>
                              </symbol>
                           </defs>
                        </svg>
                     </a>
                  </div>
                  <style>
                     .dropdown-content {
                     display: none;
                     position: absolute;
                     background-color: #f9f9f9;
                     min-width: 160px;
                     box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                     z-index: 1;
                     }
                     .dropdown-content a {
                     color: black;
                     padding: 12px 16px;
                     text-decoration: none;
                     display: block;
                     }
                     .dropdown-content a:hover {background-color: #f1f1f1}
                     .u-nav-item:hover .dropdown-content {
                     display: block;
                     }
                     .badge {
                     padding-left: 9px;
                     padding-right: 9px;
                     -webkit-border-radius: 9px;
                     -moz-border-radius: 9px;
                     border-radius: 9px;
                     }
                     .label-warning[href],
                     .badge-warning[href] {
                     background-color: #c67605;
                     }
                     #lblCartCount {
                     font-size: 12px;
                     background: #ff0000;
                     color: #fff;
                     padding: 2px 5px;
                     vertical-align: top;
                     margin-left: 42px;
                     margin-top: -40px;
                     }
                     .breadcrumb > li + li:before {
                     padding: 0 5px;
                     color: #ccc;
                     content: "/\00a0";
                     }
                  </style>
                  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
                  @include('layout.menu')
                  <style class="offcanvas-style">            
                  .u-offcanvas .u-sidenav { flex-basis: 250px !important; }            .u-offcanvas:not(.u-menu-open-right) .u-sidenav { margin-left: -250px; }            .u-offcanvas.u-menu-open-right .u-sidenav { margin-right: -250px; }            @keyframes menu-shift-left    { from { left: 0;        } to { left: 250px;  } }            @keyframes menu-unshift-left  { from { left: 250px;  } to { left: 0;        } }            @keyframes menu-shift-right   { from { right: 0;       } to { right: 250px; } }            @keyframes menu-unshift-right { from { right: 250px; } to { right: 0;       } }            </style>
               </nav>
            </div>
         </header>
         <div role="main" class="main shop py-4">
            <div class="txt" style="background: url(http://webeasyhost.com/cannon/public/front/shop/image/banner_by_ali.jpg); 
               padding: 154px; color: white; background-position: center; background-repeat: no-repeat; background-size: cover">
            </div>
            <div class="c_container" style="background: #f7f7f7f0;">
               <div class="container" style="padding-top: 26px;">
                    <ul class="breadcrumb prod" style=" margin-top: 0px; padding: 10px; background-color: #fffffffa !important; margin-bottom:0px;
                        border-radius:0px;
                        color:#999;
                        font-size:12px; ">
                        <li class="active"><a href="http://webeasyhost.com/cannon">Home</a> <span class="divider"></span></li>
                        <li style="font-size: 14px;">Thank You Page <span class="divider"></span></li>
                    </ul>
               </div>
               <div class="container">
                    <div class="row">
                        <h2>Thank You For Placing Order.</h2>
                    </div>
                </div>
            <footer class="page-footer">
               @include('layout.footer')
         </div>
         </footer>
         <section class="u-backlink u-clearfix u-grey-80">
            <a class="u-link" href="" target="_blank">
            <span>Cannon Foam</span>
            </a>
            <p class="u-text">
               <span>Developed By</span>
            </p>
            <a class="u-link" href="" target="_blank">
            <span>WEBEASY (Pvt) Limited</span>
            </a>. 
         </section>
      </div>
      <!-- Vendor -->
      <script src="{{asset('public/front/cart_resources/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/popper/umd/popper.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/common/common.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/jquery.validation/jquery.validate.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/isotope/jquery.isotope.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/vide/jquery.vide.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/vivus/vivus.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/bootstrap-star-rating/js/star-rating.min.js')}}"></script>
      <script src="{{asset('public/front/cart_resources/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js')}}"></script>
      <!-- Theme Base, Components and Settings -->
      <script src="{{asset('public/front/cart_resources/js/theme.js')}}"></script>
      <!-- Current Page Vendor and Views -->
      <script src="{{asset('public/front/cart_resources/js/views/view.shop.js')}}"></script>
      <!-- Theme Custom -->
      <script src="{{asset('public/front/cart_resources/js/custom.js')}}"></script>
      <!-- Theme Initialization Files -->
      <script src="{{asset('public/front/cart_resources/js/theme.init.js')}}"></script>
   </body>
</html>