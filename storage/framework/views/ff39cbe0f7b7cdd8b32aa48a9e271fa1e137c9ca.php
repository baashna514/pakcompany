<style type="text/css" media="screen">
ul,li, nav,a{margin:0;padding:0;}
a{text-decoration:none; font-family:helvetica; }


header h1{
    text-align:center;font-size:2em;
    border-bottom:5px solid #222;
    padding:.22em; 
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; background-color: #f62459;
    color:#fff;
}
#vertical-menu{
  display:inline-block;
  box-sizing:border-box;
  width: 244px;
  /* box-shadow: 0px 2px 3px rgb(0 0 0 / 20%); */
}
.main-menu1 {
    display:inline-block;
    width:100%;
    box-sizing:border-box;
}
.main-menu1 li{
  position:relative;
  height:50px;
  box-shadow:0 -1px 0 0 #ffffff, 0 -2px 0 0 #ffffff;
}

.main-menu1>li>a>i{
  color:#ffffff;
  width:2em;
  height:100%;
  line-height:50px;
  text-align:left; 
}
.main-menu1>li:first-child, .submenu-1>li:first-child, .submenu-2>li:first-child, .submenu-3>li:first-child{
  box-shadow:none;
}
.main-menu1>li:first-child>a, .submenu-1>li:first-child>a, .submenu-2>li:first-child>a, .submenu-3>li:first-child>a{
 /* border-top-left-radius:5px; */
  /* border-top-right-radius:5px; */
}
.main-menu1>li:last-child>a, .submenu-1>li:last-child>a, .submenu-2>li:last-child>a, .submenu-3>li:last-child>a{
 border-bottom-left-radius:5px;
  border-bottom-right-radius:5px;
}

.main-menu1>li>a, .submenu-1>li>a, .submenu-2>li>a,.submenu-3>li>a{
  color:#ffffff;
  background:#0c8d4d;
  line-height:50px;
  display:block;
  padding:0 1em;
    border-bottom: 1px solid #000;
}

 .submenu-1,.submenu-2, .submenu-3{
  position:absolute;
  white-space:nowrap;
  top:-9999px;
}
.submenu-1,.submenu-2{
    width: 244px;
}
.submenu-3{
    width: 266px;
}

.contain-submenu>a:first-child::after{
  content:" \f054";
  /* padding-left:11em; */
  float: right;
  font-family:'FontAwesome';
}
/* revealing submenus */
.main-menu1>li:hover .submenu-1, .submenu-1>li:hover .submenu-2, .submenu-2>li:hover .submenu-3{
  top:0;
   left:100%;
  transition: top .1s cubic-bezier(0.380,0.820,.790,.930);
  
}

.main-menu1>li:hover>a{
  color:#babbba;
}
.submenu-1 li:hover>a{
  color:#babbba;
}
.submenu-2 li:hover>a{
  color:#babbba;
}
.submenu-3 li:hover>a{
  color:#babbba;  
}

/* Author */
article{
  text-align:left;
  margin-left:20px;
  }
article p{
  font-size:1.2em;
  color:#f33039;
}


</style>
<?php
    $menus = \App\Category::with('subcategories', 'subcategory1', 'subcategory2')->get();
?>
<div class="responsive so-megamenu  megamenu-style-dev" id="desktop-menu-section">
    <div class="so-vertical-menu ">
        <nav class="navbar-default">    
            
            <div class="container-megamenu vertical">
                <div id="menuHeading">
                    <div class="megamenuToogle-wrapper">
                        <div class="megamenuToogle-pattern">
                            <div class="container">
                                <div>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                All Categories                          
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-header">
                    <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">      
                        <i class="fa fa-bars"></i>
                        <span>  All Categories</span>
                    </button>
                </div>
                <div class="vertical-wrapper">
                    <span id="remove-verticalmenu" class="fa fa-times"></span>
                    <div class="megamenu-pattern">
                        <div class="container-mega">
                            <nav id="vertical-menu">
                                <ul class="main-menu1">
                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $cat = str_replace(' ', '-', $category->name); 
                                        ?>
                                        <li <?php if(count($category->subcategories)>0){ ?>class="contain-submenu" <?php } ?> ><a href="<?php echo e(route('category-products-list',['name' => $cat, 'id' => $category->id])); ?>"><?php echo e($category->name); ?></a>
                                            <?php if($category->subcategories): ?>
                                                <ul class="submenu-1">
                                                    <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li <?php if(count($subcategory->subcategory1)>0){ ?> class="contain-submenu" <?php } ?> ><a href="<?php echo e(route('subcategory-products-list',['id' => encrypt($subcategory->id)])); ?>"><?php echo e($subcategory->name); ?></a>
                                                            <?php if($subcategory->subcategory1): ?>
                                                                <ul class="submenu-2">
                                                                    <?php $__currentLoopData = $subcategory->subcategory1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li <?php if(count($sub1->subcategory2)>0){ ?> class="contain-submenu" <?php } ?> ><a href="<?php echo e(route('subcategory1-products-list',['id' => encrypt($sub1->id)])); ?>"><?php echo e($sub1->name); ?></a>
                                                                            <?php if($sub1->subcategory2): ?>
                                                                                <ul class="submenu-3">
                                                                                    <?php $__currentLoopData = $sub1->subcategory2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <li><a href="<?php echo e(route('subcategory2-products-list',['id' => encrypt($sub2->id)])); ?>"><?php echo e($sub2->name); ?></a></li>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </ul>
                                                                            <?php endif; ?>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>      
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                              </nav>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/front/layout/menu.blade.php ENDPATH**/ ?>