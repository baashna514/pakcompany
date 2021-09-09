<form action="">
    <div class="row">
        <form action="<?php echo e(route('product.update-product-quick-detail')); ?>" method="POST" id="update-product-quick-detail-form" enctype="multipart/form-data">
            <input type="hidden" id="product-id" name="id" value="<?php echo e($product->id); ?>">
            <?php echo csrf_field(); ?>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="product">Product:</label>
                    <input type="text" name="name" value="<?php echo e($product->name); ?>" class="form-control" id="product" style="background-color: #e6e6e6;padding-left:7px;">
                  </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="product">Price:</label>
                    <input type="text" name="price" value="<?php echo e($product->price); ?>" class="form-control" id="price" style="background-color: #e6e6e6;padding-left:7px;">
                  </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="form-line">
                        <label for="availability">Availabilty</label><br>
                        <input type="radio" class="form-control" id="in" name="stock" value="in" <?php echo e(($product->stock=="1")? "checked" : ""); ?>>
                        <label for="in">in stock </label><br>
                        <input type="radio" class="form-control" id="out" name="stock" value="out" <?php echo e(($product->stock=="0")? "checked" : ""); ?>>
                        <label for="out">out of stock</label><br>
                    </div>
                </div>
            </div>
            <button type="submit" id="update-product" class="btn btn-success" style="margin-left: 15px;">Update</button>
        </form>
        
    </div>
</form><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/admin/product-management/products/get-products-quick-view-data.blade.php ENDPATH**/ ?>