<?php
    $footer = App\Footer::first();
?>

<style>
    .modtitle::after{
        background: <?php if($footer){ echo $footer->title_color; } ?> !important;
    }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        /* width: 50%; */
    }
    .adres{
        
    }
</style>
<footer class="footer-container typefooter-1" style="margin-top: 20px; background:<?php if($footer): ?><?php echo e($footer->background_color); ?><?php endif; ?>;color:<?php if($footer): ?><?php echo e($footer->text_color); ?><?php endif; ?>;">
    <!-- Footer Top Container -->
    <section class="footer-top" style="height: 97px">
        <div class="container ftop">
            <div class="row" style="position: relative;bottom: 37px;">
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 ">
                    <div class="module newsletter-footer1">
                        <div class="newsletter" style="width:100%;background-color: #fff ; ">
                            <div class="title-block">
                                <div class="page-heading font-title">
                                    Signup for Newsletter
                                </div>
                                <div class="promotext">We’ll never share your email address with a third-party.</div>
                            </div>

                            <div class="block_content">
                                <form method="post" id="signup" name="signup" action="<?php echo e(route('ds.subscriber.add')); ?>" class="form-group form-inline signup send-mail">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <div class="input-box">
                                            <input type="email" placeholder="Your email address..." value="" class="form-control" id="txtemail" name="email" size="55">
                                        </div>
                                        <div class="subcribe">
                                            <button class="btn btn-primary btn-default font-title" type="submit"  name="submit">
                                        Subscribe
                                    </button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                            <!--/.modcontent-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                    <ul class="socials">
                        <?php if($footer): ?>
                            <?php if($footer->facebook): ?>
                                <li class="facebook"><a class="_blank" href="<?php echo e($footer->facebook); ?>" target="_blank"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
                            <?php endif; ?>
                            <?php if($footer->twitter): ?> 
                                <li class="twitter"><a class="_blank" href="<?php echo e($footer->twitter); ?>" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
                            <?php endif; ?>
                            <?php if($footer->google): ?> 
                                <li class="google_plus"><a class="_blank" href="<?php echo e($footer->google); ?>" target="_blank"><i class="fa fa-google-plus"></i><span>Google Plus</span></a></li>
                            <?php endif; ?>
                            <?php if($footer->instagram): ?>
                                <li class="pinterest"><a class="_blank" href="<?php echo e($footer->instagram); ?>" target="_blank"><i class="fa fa-instagram"></i><span>Instagram</span></a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /Footer Top Container -->
    
    <div class="footer-middle">
        <div class="container">
          <div class="row">
              <?php if($footer): ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-style">
                    <div class="infos-footer">
                        
                        <span style="color: #555;"><b style="font-size: 18px;">Head Office (Lahore)</b></span>
                        <ul class="menu">
                            <li class="adres"><?php echo e($footer->address); ?></li>
                            <li class="phone">
                                <a href="callto:<?php echo e($footer->phone); ?>" style="color:<?php echo e($footer->text_color); ?>;"><?php echo e($footer->phone); ?></a>
                            </li>
                            <li class="mail">
                                <a href="mailto:<?php echo e($footer->email); ?>" style="color:<?php echo e($footer->text_color); ?>;"><?php echo e($footer->email); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
              <?php else: ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-style">
                    <div class="infos-footer">
                        <span style="color: #555;"><b style="font-size: 18px;">Head Office (Lahore)</b></span>
                        <ul class="menu">
                            <li class="adres">17-Urdu Bazar, Lahore, Pakistan</li>
                            <li class="phone">
                                +92-333-421-0917
                            </li>
                            <li class="mail">
                                <a href="mailto:admin@pakcompany.com.pk">admin@pakcompany.com.pk</a>
                            </li>
                        </ul>
                    </div>
                </div>
              <?php endif; ?>
                
                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-12 col-style">
                    <div class="infos-footer">
                        <span style="color: #555;"><b style="font-size: 18px;">Retail Outlet (Karachi)</b></span>
                        <ul class="menu">
                            <li class="adres">New Urdu Bazar, Rambagh Quart, Karachi</li>
                            <li class="phone">
                                +92-21-32603104
                            </li>
                            <li class="mail">
                                <a href="mailto:admin@pakcompany.com.pk">admin@pakcompany.com.pk</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-12 col-style">
                    <div class="box-information box-footer">
                        <div class="module clearfix">
                            <span style="color: #555;"><b style="font-size: 18px;">Pages</b></span>
                            <div class="modcontent" style="margin-top: 15px;">
                                <ul class="menu">
                                    <li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Support And Services</a></li>
                                    <!--<li><a href="#">Support 24/7 page</a></li>-->
                                    <li><a href="#">Site Map</a></li>
                                    <!--<li><a href="#">Product Support</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-12 col-style">
                    <div class="box-service box-footer">
                        <div class="module clearfix">
                            <span style="color: #555;margin-bottom:10px;"><b style="font-size: 18px;">Company</b></span>
                            <div class="modcontent" style="margin-top: 15px;">
                                <p style="margin-bottom: 10px;">Welcome to pakcompany.com.pk By the grace of Allah Almighty we are the first Pakistani company that have developed,introduce and published the Holy Qur’an from computerizeed calligraphic Arabic font.</p>
                                <a href="">
                                    <img src="<?php echo e(asset('public/front/image/facebook.png')); ?>" alt="facebook" title="Facebook" style="width: 40px;">
                                </a>
                                <a href="">
                                    <img src="<?php echo e(asset('public/front/image/instagram.png')); ?>" title="Instagram" alt="instagram" style="width: 40px;">
                                </a>
                                <a href="">
                                    <img src="<?php echo e(asset('public/front/image/whatsapp.png')); ?>" alt="whatsapp" title="Whatsapp" style="width: 40px;">
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Container -->
    <div class="footer-bottom ">
        <div class="container">
            <?php if($footer): ?>
                <div class="copyright">
                    <?php echo e($footer->copyrights); ?>. Developed by <a href="<?php echo e($footer->developer_url); ?>" target="_blank" style="color: #b4b6b9;"><?php echo e($footer->developer_name); ?>.
                </div>
            <?php else: ?>
                <div class="copyright">
                    PAK Company © 2021. All Rights Reserved. Developed by <a href="http://www.webeasy.pk/" target="_blank" style="color: #b4b6b9;">WebEasy (pvt) Ltd.
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- /Footer Bottom Container -->
    
    
        <!--Back To Top-->
    <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
</footer><?php /**PATH C:\wamp64\www\pakcompany\resources\views/front/layout/footer.blade.php ENDPATH**/ ?>