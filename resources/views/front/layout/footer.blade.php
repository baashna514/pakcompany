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
<footer class="footer-container typefooter-1" style="margin-top: 20px; background:@if($footer){{ $footer->background_color }}@endif;color:@if($footer){{ $footer->text_color }}@endif;">
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
                                <form method="post" id="signup" name="signup" action="{{route('ds.subscriber.add')}}" class="form-group form-inline signup send-mail">
                                    @csrf
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
                        @if ($footer)
                            @if ($footer->facebook)
                                <li class="facebook"><a class="_blank" href="{{ $footer->facebook }}" target="_blank"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
                            @endif
                            @if ($footer->twitter) 
                                <li class="twitter"><a class="_blank" href="{{ $footer->twitter }}" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
                            @endif
                            @if ($footer->google) 
                                <li class="google_plus"><a class="_blank" href="{{ $footer->google }}" target="_blank"><i class="fa fa-google-plus"></i><span>Google Plus</span></a></li>
                            @endif
                            @if ($footer->instagram)
                                <li class="pinterest"><a class="_blank" href="{{ $footer->instagram }}" target="_blank"><i class="fa fa-instagram"></i><span>Instagram</span></a></li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /Footer Top Container -->
    
    <div class="footer-middle">
        <div class="container">
          <div class="row">
              @if ($footer)
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-style">
                    <div class="infos-footer">
                        {{-- <a href="#"><img src="{{asset('public/theme/footer/').'/'. $footer->logo}}" alt="image" style="margin-left: -30px;"></a> --}}
                        <span style="color: #555;"><b style="font-size: 18px;">Head Office (Lahore)</b></span>
                        <ul class="menu">
                            <li class="adres">{{$footer->address}}</li>
                            <li class="phone">
                                <a href="callto:{{$footer->phone}}" style="color:{{ $footer->text_color }};">{{$footer->phone}}</a>
                            </li>
                            <li class="mail">
                                <a href="mailto:{{$footer->email}}" style="color:{{ $footer->text_color }};">{{$footer->email}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
              @else
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
              @endif
                
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
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{route('faq')}}">FAQ</a></li>
                                    {{-- <li><a href="#">Support And Services</a></li> --}}
                                    <!--<li><a href="#">Support 24/7 page</a></li>-->
                                    <li><a href="{{route('sitemap')}}">Site Map</a></li>
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
                                <a href="https://www.facebook.com/PakCompanyOfficial/">
                                    <img src="{{asset('public/front/image/facebook.webp')}}" alt="facebook" title="Facebook" style="width: 40px;">
                                </a>
                                <a href="https://www.instagram.com/pakcompanyofficial/">
                                    <img src="{{asset('public/front/image/instagram.webp')}}" title="Instagram" alt="instagram" style="width: 40px;">
                                </a>
                                <a href="https://wa.me/923334210917/?text=Hi..! How may i help you?">
                                    <img src="{{asset('public/front/image/whatsapp.webp')}}" alt="whatsapp" title="Whatsapp" style="width: 40px;">
                                </a>
                                {{-- <ul class="menu">
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Site Map</a></li>
                                    <li><a href="#">Customer Service</a></li>
                                    <li><a href="#">Custom Link</a></li>
                                </ul> --}}
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
            @if ($footer)
                <div class="copyright">
                    {{$footer->copyrights}}. Developed by <a href="{{$footer->developer_url}}" target="_blank" style="color: #b4b6b9;">{{$footer->developer_name}}.
                </div>
            @else
                <div class="copyright">
                    PAK Company © 2021. All Rights Reserved. Developed by <a href="http://www.webeasy.pk/" target="_blank" style="color: #b4b6b9;">WebEasy (pvt) Ltd.
                </div>
            @endif
        </div>
    </div>
    <!-- /Footer Bottom Container -->
    
    
        <!--Back To Top-->
    <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
</footer>