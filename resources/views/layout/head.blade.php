@php
    $theme_setting = \App\ThemeSetting::first();
@endphp
@if ($theme_setting)
    <title>{{ $theme_setting->hd_title }}</title>
@else
    <title>MyShopik.com - A brand of WebEasy Pvt Limited</title>
@endif
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@if ($theme_setting->hd_fevicon)
    <link rel="icon" href="{{ asset('public/theme/').'/'. $row->hd_fevicon }}" type="image/x-icon">
@endif
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta name="keywords" content="What are minimalist designs?, Salmon with salad">
<meta name="description" content="">
<meta name="page_type" content="np-template-header-footer-from-plugin">
<link rel="stylesheet" href="{{ asset('public/front/nicepage.css') }}" media="screen">
<link rel="stylesheet" href="{{ asset('public/front/Home.css') }}" media="screen">
<script class="u-script" type="text/javascript" src="{{ asset('public/front/jquery.js') }}" defer=""></script>
<script class="u-script" type="text/javascript" src="{{ asset('public/front/nicepage.js') }}" defer=""></script>
<link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
<script type="application/ld+json">{
   "@context": "http://schema.org",
   "@type": "Organization",
   "name": "",
   "url": "{{ route('index') }}",
   "logo": "{{ asset('public/front/images/default-logo.png')}}"
   }
</script>
<meta property="og:title" content="Home">
<meta property="og:type" content="website">
<meta name="theme-color" content="#478ac9">
<link rel="canonical" href="{{ route('index') }}">
<meta property="og:url" content="{{ route('index') }}">
<style>
#wpf-loader-two {
  height: 100%;
  bottom: 0;
  left: 0;
  position: fixed;
  right: 0;
  top: 0;
  width: 100%;
  z-index: 99999;
}

#wpf-loader-two .wpf-loader-two-inner {
  border: 2px solid #fff;
  border-radius: 50%;
  height: 100px;
  left: 46%;
  position: absolute;
  top: 40%;
  width: 100px;
  text-align: center;
}

#wpf-loader-two .wpf-loader-two-inner:before {
  content: "";
  height: 57%;
  left: -204px;
  position: absolute;
  top: -5px;
  transition: all 0.5s ease 0s;
  width: 200px;
  -webkit-animation-name: loader-two-before-transition;
  -webkit-animation-duration: 1.5s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
  animation-name: loader-two-before-transition;
  animation-duration: 1.5s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

#wpf-loader-two .wpf-loader-two-inner:after {
  content: "";
  height: 57%;
  left: 104%;
  position: absolute;
  top: 50%;
  transition: all 0.5s ease 0s;
  width: 200px;
  -webkit-animation-name: loader-two-after-transition;
  -webkit-animation-duration: 1.5s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
  animation-name: loader-two-after-transition;
  animation-duration: 1.5s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

#wpf-loader-two .wpf-loader-two-inner span {
  color: #fff;
  display: inline-block;
  margin-top: 42%;
}
</style>