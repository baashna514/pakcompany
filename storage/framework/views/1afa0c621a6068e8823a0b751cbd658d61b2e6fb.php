<style>
    #sub-menu:hover{
        box-shadow:0 0 5px rgba(0, 0, 0, 0.15);
        padding: 8px;
    }
    .search {
    position: relative;
    display: inline-block;
    }
    input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
  color: rgb(56, 54, 54);
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
  color: rgb(56, 54, 54);
}

input[type=submit] {
  background-color: DodgerBlue;
  color: rgb(56, 54, 54);
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
  color: rgb(56, 54, 54);
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
  color: rgb(36, 31, 31);
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
  color: rgb(36, 31, 31);
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(85, 83, 83, 0.3);
    border-radius: 4px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    border-radius: 4px;
    -webkit-box-shadow: inset 0 0 6px rgba(85, 83, 83, 0.3);
    background-color: #585656;
}

#search {
    width: 100px;
    box-sizing: border-box;
    border: 1px solid #0c8d4d;
    border-radius: 4px;
    font-size: 14px;
    line-height: 2;
    background-color: white;
    background-image: url(https://cdn2.iconfinder.com/data/icons/font-awesome/1792/search-512.png);
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 0px 12px 0px 22px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    float: right;
    margin-right: 24px;
}
#search:focus {
  width: 50%;
  border: 1px solid #0c8d4d !important;
}
</style>
<?php
    $row = \App\ThemeSetting::first();
    $products = \App\Product::all();
    $pro = array();
    foreach($products as $product){
        $pro[]= $product->name;
    }
?>
<header id="header" class=" typeheader-4">
    <!-- Header Top -->
    <div class="header-top hidden-compact">
        <div class="container">
            <div class="row">
                <div class="header-top-left col-lg-6 col-md-4 col-sm-6 col-xs-7">
                    <ul class="top-link list-inline lang-curr">
                        <li class="hidden-sm hidden-xs"><a href="mailto:pakcompany@hotmail.com"><i class="fa fa-envelope"></i> pakcompany@hotmail.com</a></li>
                        <li class="hidden-sm hidden-xs"><a href="callto:03216788889"><i class="fa fa-phone"></i> +92-321-678-8889</a></li>
                    </ul>
                </div>
                <div class="header-top-right collapsed-block col-lg-6 col-md-8 col-sm-6 col-xs-5">
                    <ul class="top-link list-inline">
                        
                        <li class="checkout hidden-sm hidden-xs"><a href="<?php echo e(route('wishlist')); ?>" class="btn-link" title="Wish List "><span ><i class="fa fa-heart"></i> Wishlist (0) </span></a>
                        </li>
                        <?php if(Auth::user()): ?>  
                            <li class="checkout hidden-sm hidden-xs"><a href="<?php echo e(route('my-account')); ?>" class="btn-link" title="Compare List "><span ><i class="fa fa-user"></i> My Account</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if(!Auth::check()): ?>
                        <li class="hidden-xs"><a href="<?php echo e(route('login-account')); ?>">Login/</a><a href="<?php echo e(route('register-account')); ?>">Register</a>
                        </li>
                        <?php else: ?>
                            <li class="hidden-sm hidden-xs"><a href="<?php echo e(route('user.logout')); ?>" title="Logout"><i class="fa fa-sign-out"></i> Logout </a></li>
                        <?php endif; ?>
                    </ul>                    
                </div>
            </div>
        </div>
    </div>

    <!-- //Header Top -->

    <!-- Header center -->
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 header-social">
                    <ul>
                        <li style="margin-left: 5px;letter-spacing: 12px;"><a href="" style="color:#585656;"><img src="<?php echo e(asset('public/front/image/facebook.png')); ?>" alt="facebook" title="Facebook" style="width: 40px;"></a>
                            <a href="" style="color:#585656;"><img src="<?php echo e(asset('public/front/image/instagram.png')); ?>" title="Instagram" alt="instagram" style="width: 40px;"></a>
                            <a href="" style="color:#585656;"><img src="<?php echo e(asset('public/front/image/whatsapp.png')); ?>" alt="whatsapp" title="Whatsapp" style="width: 40px;"></a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 header-logo">
                    <div class="logo" style="text-align: center;margin-top: -40px;margin-bottom: -20px;"><a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset('public/theme').'/'.$row->hd_img_logo); ?>" title="Your Store" alt="Your Logo Here" style="width: 85%;margin-top:15px;"/></a></div>
                </div>

                <div class="col-lg-4">
                    <ul>
                        <li>
                            <div class="shopping_cart">
                                <div id="cart" class="btn-shopping-cart">
                                    
                                </div>
                            </div>
                        </li>
                        <li>
                            <form class="header-search">
                                <input type="text" id="search" name="search" placeholder="Search..">
                              </form>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- //Header center -->

    <!-- Header Bottom -->
    <div class="header-bottom hidden-compact">
        <div class="container">
            <div class="row">
                
                <div class="bottom1 menu-vertical col-lg-2 col-md-3">
                    <!-- Secondary menu -->
                    <?php echo $__env->make('front.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- // end Secondary menu -->
                </div>
                <!-- Main menu -->
                <div class="main-menu col-lg-10 col-md-9">
                    <div class="responsive so-megamenu megamenu-style-dev">
                        <nav class="navbar-default">
                            <div class=" container-megamenu  horizontal open ">
                                <div class="navbar-header">
                                    <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                
                                <div class="megamenu-wrapper">
                                    <span id="remove-megamenu" class="fa fa-times"></span>
                                    <div class="megamenu-pattern">
                                        <div class="container-mega">
                                            <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                <li class="" id="Home">
                                                    <a href="<?php echo e(route('index')); ?>">Home</a>
                                                </li>
                                                <li class=""  id="About Us">
                                                    <p class="close-menu"></p>
                                                    <a href="<?php echo e(route('about')); ?>" class="clearfix">About Us</a>
                                                </li>
                                                <li class="" id="Shop">
                                                    <p class="close-menu"></p>
                                                    <a href="<?php echo e(route('products-list')); ?>" class="clearfix">Shop</a>
                                                </li>
                                                <li class="" id="Contact Us">
                                                    <p class="close-menu"></p>
                                                    <a href="<?php echo e(route('contact')); ?>" class="clearfix">Contact Us</a>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- //end Main menu -->  
            </div>
        </div>

    </div>

</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    // function autocomplete(inp, arr) {
    //   /*the autocomplete function takes two arguments,
    //   the text field element and an array of possible autocompleted values:*/
    //   var currentFocus;
    //   /*execute a function when someone writes in the text field:*/
    //   inp.addEventListener("input", function(e) {
    //       var a, b, i, val = this.value;
    //       /*close any already open lists of autocompleted values*/
    //       closeAllLists();
    //       if (!val) { return false;}
    //       currentFocus = -1;
    //       /*create a DIV element that will contain the items (values):*/
    //       a = document.createElement("DIV");
    //       a.setAttribute("id", this.id + "autocomplete-list");
    //       a.setAttribute("class", "autocomplete-items");
    //       /*append the DIV element as a child of the autocomplete container:*/
    //       this.parentNode.appendChild(a);
    //       /*for each item in the array...*/
    //       for (i = 0; i < arr.length; i++) {
    //         /*check if the item starts with the same letters as the text field value:*/
    //         if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
    //           /*create a DIV element for each matching element:*/
    //           b = document.createElement("DIV");
    //           /*make the matching letters bold:*/
    //           b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
    //           b.innerHTML += arr[i].substr(val.length);
    //           /*insert a input field that will hold the current array item's value:*/
    //           b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
    //           /*execute a function when someone clicks on the item value (DIV element):*/
    //           b.addEventListener("click", function(e) {
    //               /*insert the value for the autocomplete text field:*/
    //               inp.value = this.getElementsByTagName("input")[0].value;
    //               /*close the list of autocompleted values,
    //               (or any other open lists of autocompleted values:*/
    //               closeAllLists();
    //           });
    //           a.appendChild(b);
    //         }
    //       }
    //   });
    //   /*execute a function presses a key on the keyboard:*/
    //   inp.addEventListener("keydown", function(e) {
    //       var x = document.getElementById(this.id + "autocomplete-list");
    //       if (x) x = x.getElementsByTagName("div");
    //       if (e.keyCode == 40) {
    //         /*If the arrow DOWN key is pressed,
    //         increase the currentFocus variable:*/
    //         currentFocus++;
    //         /*and and make the current item more visible:*/
    //         addActive(x);
    //       } else if (e.keyCode == 38) { //up
    //         /*If the arrow UP key is pressed,
    //         decrease the currentFocus variable:*/
    //         currentFocus--;
    //         /*and and make the current item more visible:*/
    //         addActive(x);
    //       } else if (e.keyCode == 13) {
    //         /*If the ENTER key is pressed, prevent the form from being submitted,*/
    //         e.preventDefault();
    //         if (currentFocus > -1) {
    //           /*and simulate a click on the "active" item:*/
    //           if (x) x[currentFocus].click();
    //         }
    //       }
    //   });
    //   function addActive(x) {
    //     /*a function to classify an item as "active":*/
    //     if (!x) return false;
    //     /*start by removing the "active" class on all items:*/
    //     removeActive(x);
    //     if (currentFocus >= x.length) currentFocus = 0;
    //     if (currentFocus < 0) currentFocus = (x.length - 1);
    //     /*add class "autocomplete-active":*/
    //     x[currentFocus].classList.add("autocomplete-active");
    //   }
    //   function removeActive(x) {
    //     /*a function to remove the "active" class from all autocomplete items:*/
    //     for (var i = 0; i < x.length; i++) {
    //       x[i].classList.remove("autocomplete-active");
    //     }
    //   }
    //   function closeAllLists(elmnt) {
    //     /*close all autocomplete lists in the document,
    //     except the one passed as an argument:*/
    //     var x = document.getElementsByClassName("autocomplete-items");
    //     for (var i = 0; i < x.length; i++) {
    //       if (elmnt != x[i] && elmnt != inp) {
    //         x[i].parentNode.removeChild(x[i]);
    //       }
    //     }
    //   }
    //   /*execute a function when someone clicks in the document:*/
    //   document.addEventListener("click", function (e) {
    //       closeAllLists(e.target);
    //   });
    // }

    
    // var countries = <?php echo json_encode($pro); ?>;
    // autocomplete(document.getElementById("myInput"), countries);

    $('li').click(function(e) {
        // e.preventDefault();
        // var id = $(this).attr("id");
        // alert(id);
        // var val=$('li:has(a[text="'+id+'"])').addClass('active');
        // $(id).siblings().find(".active").removeClass("active");
        // $(id).addClass("active");
        // localStorage.setItem("selectedolditem", id);
        $('li').removeClass("active");
        $(this).addClass("active");
        // localStorage.setItem('active', $(this).index());
    });

    // var selectedolditem = localStorage.getItem('selectedolditem');
    // if (selectedolditem != null) {
    //     $(selectedolditem).siblings().find(".active").removeClass("active");
    //     $(selectedolditem).addClass("active");
    // }

    
</script><?php /**PATH /home/webeasydemos/public_html/pakcompany/resources/views/front/layout/header.blade.php ENDPATH**/ ?>