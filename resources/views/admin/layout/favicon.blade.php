@php
    $theme_setting = \App\ThemeSetting::first();
@endphp
@if ($theme_setting->hd_fevicon)
    <link rel="icon" href="{{ asset('public/theme/').'/'. $theme_setting->hd_fevicon }}" type="image/x-icon">
@endif