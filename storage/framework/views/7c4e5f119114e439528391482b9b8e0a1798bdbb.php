<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
             <?php if(Auth::user()->is_admin==1): ?>
            <a class="navbar-brand" href="<?php echo e(route('ds.dashboard')); ?>">Pak Company - Admin Panel</a>
           <?php else: ?>
           <a class="navbar-brand" href="<?php echo e(route('ds.dashboard')); ?>">Pak Company - Admin Panel</a>
           <?php endif; ?>
        </div>
    </div>
</nav><?php /**PATH /home/webeasydemos/public_html/pakcompany/resources/views/admin/layout/top-bar.blade.php ENDPATH**/ ?>