<?php
    $theme_setting = \App\ThemeSetting::first();
?>
<?php if($theme_setting->hd_fevicon): ?>
    <link rel="icon" href="<?php echo e(asset('public/theme/').'/'. $theme_setting->hd_fevicon); ?>" type="image/x-icon">
<?php endif; ?><?php /**PATH /home/webeasydemos/public_html/pakcompany/resources/views/admin/layout/favicon.blade.php ENDPATH**/ ?>