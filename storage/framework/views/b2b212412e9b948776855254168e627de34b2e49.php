<!-- Basic page needs -->
<title>Pak Company Publishers - Buy Online Holy Quran , Tafseer, Ahadees</title>
<meta charset="utf-8">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<meta name="keywords" content="MyShopik, A brand of WebEasy Pvt Limited, best online store." />
<meta name="description" content="MyShopik formally known as WebEasy, is brand of WebEasy Pvt Limited and, is committed to work on quality and reliability and always trying to find new and innovative ways.
WebEasy Pvt Limted has steadily diversified its core activities by venturing into new business and continued to expand successfully forged ahead in terms of revenue and turnover." />
<meta name="author" content="Moin Abbas">
<meta name="robots" content="index, follow" />
<!-- Mobile specific metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Favicon -->
<?php
    $row = \App\ThemeSetting::first();
?>
<?php if($row): ?>
    <?php if($row->hd_fevicon): ?>
        <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('public/theme').'/'.$row->hd_fevicon); ?>"/>
    <?php endif; ?>
<?php endif; ?><?php /**PATH /home/webeasydemos/public_html/pakcompany/resources/views/front/layout/meta.blade.php ENDPATH**/ ?>