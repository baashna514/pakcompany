<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info bg-indigo">
        
        <div class="info-container">
           <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></div>
            <div class="email" ><a style="color: white" href="<?php echo e(route('user.profiles',Auth::id())); ?>">View Profile</a></div>
            <div class="btn-group user-helper-dropdown">
                <a href="<?php echo e(route('admin.logout')); ?>" style="color: #fff;" title="Logout"><i class="material-icons">power_settings_new</i></a>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?php echo e(route('ds.dashboard')); ?>">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <?php if(Auth::user()->is_admin==1): ?>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>Theme Settings</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?php echo e(route('ds.theme-setting.slider-setting')); ?>">Slider Setting</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('ds.theme-setting.favicon-setting')); ?>">Favicon</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('ds.theme-setting.logo-setting')); ?>">Logo</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('ds.theme-setting.footer-setting')); ?>">Footer</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>Store Settings</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?php echo e(route('md.store-setting.deals-of-the-day')); ?>">Deals of the Day</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('md.store-setting.top-collections')); ?>">Top Collections</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('md.store-setting.page-layout')); ?>">Page Layout</a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
            <!--<?php if(Auth::user()->is_admin!=1): ?>-->
            <li>
                <a href="<?php echo e(route('api.integration')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>Integration</span>
                </a>
            </li>
            <!--<?php endif; ?>-->
            <?php if(Auth::user()->is_admin==1): ?>
           <li>
                <a href="<?php echo e(route('ds.customer.view')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>Customers</span>
                </a>
            </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(route('ds.category.view')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('ds.subcategory.view')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>SubCategory</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('ds.subcategory2.view')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>SubCategory 2</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('ds.subcategory.view')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>SubCategory 3</span>
                </a>
            </li>
            
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>Products</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?php echo e(route('ds.product-management.new-product-form')); ?>">Add New</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('ds.product-management.products')); ?>">Products List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo e(route('ds.orders')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>Orders</span>
                </a>
            </li>
            <li>
               
            </li>
             <?php if(Auth::user()->is_admin==1): ?>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>Shipping</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?php echo e(route('ds.shipping.shipping')); ?>">Shipping Charges</a>
                    </li>
                    
                </ul>
            </li>
            <?php endif; ?>
           <li>
                <a href="<?php echo e(route('ds.subscriber.view')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>Subscribers</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('ds.coupon.view')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>Coupon</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('ds.vendor-claims')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>Claims</span>
                </a>
            </li>
            
            <?php if(Auth::user()->is_admin==0): ?>
            <li>
                <a href="<?php echo e(route('ds.wallet.my-wallet')); ?>">
                    <i class="material-icons">view_list</i>
                    <span>My Wallet</span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            
 <?php if(Auth::user()->is_admin==1): ?>
            &copy; 2021 <a href="javascript:void(0);">Pak Company - Buy Online Holy Quran, Tafseer, Ahadees</a>.
           <?php else: ?>
          &copy; 2021 <a href="javascript:void(0);">Pak Company - Buy Online Holy Quran, Tafseer, Ahadees</a>.
           <?php endif; ?>

        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/admin/layout/left-sidebar.blade.php ENDPATH**/ ?>