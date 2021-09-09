
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ORDERS LIST</h2>
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
                                Order Management
                                <small>Orders List</small>
                            </h2>
                            
                            
                            <div class="row clearfix" style="margin-top: 10px;">
                                
                                <div class="col-lg-6">
                                    <form>
                                        <div class="form-group">
                                            <label for="email">Change Status</label>
                                            <select name="status"  id="status" class="form-control show-tick ms" style="background: #efeeee;margin-bottom: -15px;border-radius: 4px;padding-left: 7px;">
                                                <option>Select Status</option>
                                                <option value="Accept">Accept</option>
                                                <option value="Reject">Reject</option>
                                                <option value="Stock Checking">Stock checking</option>
                                                <option value="Call Confirmation">Call Confirmation</option>
                                                <option value="Delivered">Delivered</option>
                                                <option value="Returned">Returned</option>
                                                <option value="Complete">Complete</option>
                                            </select>
                                        </div>
                                        <button type="submit" id="change-status" class="btn btn-default">Change</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Date</th>
                                            <th>View Details</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Date</th>
                                            <th>View Details</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><input type="checkbox" class="check_id form-control" id="checkbox<?php echo e($key); ?>"  value="<?php echo e($order->id); ?>">
                                                    <label for="checkbox<?php echo e($key); ?>"></label></td>
                                                <td><?php echo e($order->order_no); ?></td>
                                                <td><?php echo e(ucfirst($order->status)); ?></td>
                                                <td><?php echo e($order->name); ?></td>
                                                <td><?php echo e($order->phone); ?></td>
                                                <td><?php echo e($order->city); ?></td>
                                                <td><?php echo e($order->created_at->toDateString()); ?></td>
                                                <td><a href="<?php echo e(route('product.order.view',$order->id)); ?>">view Detail</a></td>
                                                
                                                    
                                                </td> --}}
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
    </section>

<!-- Order Edit Modal -->
<div id="ModalOrderDetail" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="border-radius: 4px;">
        <div class="modal-header" style="background: #c8c1c173;">
            <h4 class="modal-title">Order Detail</h4>
            <button type="button" class="btn close" data-dismiss="modal" style="background: #000;padding: 5px;margin-top: -24px;border-radius: 11%;">&times;</button>
        </div>
        <div class="modal-body" id="order-detail-modal-body">
            
        </div>
      </div>
  
    </div>
</div>
<script type="text/javascript">
    ///////////////change status///////////////////
    $(document).on('click','#change-status',function(){
        var status =$('#status').val();
        $('.check_id').each(function () {
        var id = this.checked ? $(this).val() : "";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var pathname = window.location.origin; 
            console.log(pathname);
            $.ajax({
                type:'post',
                url:'<?php echo e(route("update-order-a-status")); ?>',
            data: {
                    "id": id,
                    "status":status
                    // method and token not needed in data
                },
                success:function(response){
                $("#tbody").load(" #tbody");
                }
            });
        });           
    });

    $('.preview').on('click', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('order.get-order-detail')); ?>",
            data: {id:id},
            success: function(data){
                // alert(data);
                document.querySelector("#order-detail-modal-body").innerHTML = (data);
                $('#ModalOrderDetail').modal('show');
            },
            error: function(data){
                alert('Error...!');
            }
        });
    });
</script>
    <!-- Jquery Core Js -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webeasydemos/public_html/pakcompany/resources/views/admin/orders/orders.blade.php ENDPATH**/ ?>