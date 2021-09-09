
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PRODUCTS LIST</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="" style="margin-bottom: 20px;">
                            <?php echo $__env->make('admin.layout.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Product Management
                                <small>Products List</small>
                            </h2>
                            <div class="row clearfix" style="margin-bottom: 10px;margin-top: 10px;">
                                <div class="col-lg-4">
                                    <form action="<?php echo e(route('export.product')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="file" name="file" class="form-control">
                                    </form>
                                    <button class="btn btn-success" style="margin-top: 10px;">Import User Data</button>
                                </div>
                                <?php if(Auth::user()->is_admin==1): ?>
                                <div class="col-lg-4">
                                    <select name="status" id="status" class="form-control show-tick ms" required="required">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="0">Not Approved</option>
                                        <option value="1">Approved</option>
                                    </select>
                                    <button type="submit" id="change" class="btn btn-default" style="margin-top: 10px;">Change</button>
                                </div>
                                <?php endif; ?>
                                <div class="col-lg-4">
                                    <select name="featured" id="featured" class="form-control show-tick ms" required="required">
                                        <option disabled selected>Change Featured Product</option>
                                        <option value="1">YES</option>
                                        <option value="0">NO</option>
                                    </select>
                                    <button type="submit" id="change-feature" class="btn btn-default" style="margin-top: 10px;">Change</button>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="#deleteEmployeeModal" style="height: 30px" class="btn btn-danger" data-toggle="modal"><i class="material-icons" >&#xE15C;</i> <span>Delete</span></a>
                                    </li>
                                    <?php if(Auth::user()->is_admin==1): ?>
                                        <li class="dropdown">
                                            <a href="<?php echo e(route('ds.product-management.new-product-form')); ?>" class="btn btn-primary">New Product</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tbody" class="table table-bordered table-striped table-hover dataTable ">
                                    <thead>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>is_Featured</th>
                                            <th style="width: 100px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>is_Featured</th>
                                            <th >Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody >
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $id = ($product->id);
                                            $index = $key + 1;
                                        ?>
                                            <tr>
                                                <td style="border-color: black: ">
                                                
                                                    <input type="checkbox" class="check_id form-control" id="checkbox<?php echo e($key); ?>"  value="<?php echo e($product->id); ?>">
                                                    <label for="checkbox<?php echo e($key); ?>"></label>
                                               
                                            </td>
                                                <td>
                                                    <div class="thumbnail">
                                                        <?php if($product->integration_id): ?>
                                                            <?php if(strpos($product->p_thumbnail, 'daraz.pk') !== false): ?>
                                                                <img src="<?php echo e($product->p_thumbnail); ?>" class="img-1 img-responsive" alt="image" style="width: 60px">
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('public/thumbnail/').'/'.$product->p_thumbnail); ?>" class="img-1 img-responsive" alt="image" style="width: 60px">
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/thumbnail/').'/'.$product->p_thumbnail); ?>" class="img-1 img-responsive" alt="image" style="width: 60px">
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td><?php echo e($product->name); ?></td>
                                                <td><?php echo e($product->price); ?></td>
                                                <?php if($product->status ==0): ?>
                                                    <td><span style="background: #eab804;padding: 5px;border-radius: 2px;font-size: 11px;">Not Approved</span></td>
                                                <?php endif; ?>
                                                <?php if($product->status ==1): ?>
                                                    <td><span style="background: #058a1b;padding: 5px;border-radius: 2px; color:#fff; font-size: 11px;">Approved</span></td>
                                                <?php endif; ?>
                                                <?php if($product->is_featured == FALSE): ?>
                                                    <td><span style="background: #eab804;padding: 5px;border-radius: 2px;font-size: 11px;">NO</span></td>
                                                <?php endif; ?>
                                                <?php if($product->is_featured == TRUE): ?>
                                                    <td><span style="background: #058a1b;padding: 5px;border-radius: 2px; color:#fff;font-size: 11px;">YES</span></td>
                                                <?php endif; ?>
                                                <td>
                                                    <a href="<?php echo e(route('ds.product-management.edit-product-form', ['id' => $id])); ?>" class="btn btn-primary"><i class="material-icons">edit</i></a>
                                                    <a href="<?php echo e(route('ds.product-management.product-delete', ['id' => $id])); ?>" class="btn btn-primary"><i class="material-icons">delete</i></a>
                                                    <br>
                                                    <br>
                                                    <a href="<?php echo e(route('view.comment',$product->id)); ?>">View Comments</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
              <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Delete Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="button" id="deleteAll" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>
<script type="text/javascript">
    
$(document).on('click','#deleteAll',function(){
      console.log("clicekd");
   $('.check_id').each(function () {
       var id = this.checked ? $(this).val() : "";
       console.log(id);
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
            });
    $.ajax({
        type:'get',
        url:'<?php echo e(route("ds.product-management.product-delete")); ?>',
       data: {
            "id": id // method and token not needed in data
        },
        success:function(response){
           $("#tbody").load(" #tbody");
             
        }
    });
  });
   $('#deleteEmployeeModal').modal('hide');
    $('div').removeClass('modal-backdrop');
    $("#tbody").load(" #tbody");
});
///////////////change status///////////////////
$(document).on('click','#change',function(){
    var status =$('#status').val();
    $('.check_id').each(function () {
       var id = this.checked ? $(this).val() : "";
       console.log(id);
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'post',
            url:'<?php echo e(route("update-product-status")); ?>',
        data: {
                "id": id,
                "status":status
            },
            success:function(response){
            console.log("success");    
            }
        });
    });
    $('#deleteEmployeeModal').modal('hide');
    $('div').removeClass('modal-backdrop');
    $("#tbody").load(" #tbody");
});

///////////////change featured///////////////////
$(document).on('click','#change-feature',function(){
    var feature =$('#featured').val();
    $('.check_id').each(function () {
       var id = this.checked ? $(this).val() : "";
       console.log(id);
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'post',
            url:'<?php echo e(route("update-featured-product")); ?>',
        data:{
                "id": id,
                "feature":feature
            },
            success:function(response){
                $('#deleteEmployeeModal').modal('hide');
                $('div').removeClass('modal-backdrop');
                $("#tbody").load(" #tbody");
            }
        });
    });
});
</script>
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webeasydemos/public_html/pakcompany/resources/views/admin/product-management/products/products-list.blade.php ENDPATH**/ ?>