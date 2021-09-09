
<?php $__env->startSection('content'); ?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Customers LIST</h2>
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
           
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Customers Management
                                <small>Customers List</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">                             
                                <div class="col-lg-7">
                                    <select name="status" id="status" class="form-control show-tick ms" required="required">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="0">Not Registered</option>
                                        <option value="1">Registered</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-default" id="change">Change</button>
                                </div>
                                <div class="col-lg-2"><a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal" style="margin-bottom: 5px;"><i class="material-icons" >&#xE15C;</i> <span>Delete</span></a> </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table  id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                        
                                            <th>SR#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Order Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Order Detail</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if($users): ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $index = $key + 1;
                                        ?>
                                        <tr>
                                            <td style="border-color: black: ">
                                                
                                                    <input type="checkbox" class="check_id form-control" id="checkbox<?php echo e($key); ?>"  value="<?php echo e($user->id); ?>">
                                                    <label for="checkbox<?php echo e($key); ?>"></label>
                                               
                                            </td>
                                            <td><?php echo e($user->name); ?></td>
                                           
                                             <td><?php echo e($user->email); ?></td>
                                            </td>
                                                <?php if($user->status == 0): ?>
                                                    <td><span style="background: #eab804;padding: 5px;border-radius: 2px;">Not Registered</span></td>
                                                <?php endif; ?>
                                                <?php if($user->status == 1): ?>
                                                    <td><span style="background: #058a1b;padding: 5px;border-radius: 2px; color:#fff;">Registered</span></td>
                                                <?php endif; ?>
                                                <td><a href="<?php echo e(route('ds.customerorders',$user->id)); ?>">View Order Detail</a></td>
                                            <td>
                                                <a data-id="<?php echo e($user->id); ?>" href="#" class="btn btn-primary editCoupon"><i class="material-icons" data-toggle="modal" data-target="#couponModal">edit</i></a> 
                                                <a href="<?php echo e(route('ds.users.delete', ['id' => $user->id])); ?>" class="btn btn-primary"><i class="material-icons">delete</i></a>
                                            </td>
                                            
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <tr>
                                            <td>No Data</td>
                                        </tr>
                                        <?php endif; ?>
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
<!-- Edit Weight Modal -->
<div class="modal fade" id="couponModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Customer</h4>
            </div>
            <form action="<?php echo e(route('ds.users.edit_action')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
                <input type="hidden" id="user_id" name="id">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="category">Name:</label>
                                <input type="text" value="" id="name" name="name" class="form-control" placeholder="Category Name"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="category">Email:</label>
                                <input type="email" value="" id="email" name="email" class="form-control" placeholder="Category Name"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="category">Password:</label>
                                <input type="password" id="
                                password" value="" name="password" class="form-control" placeholder="Category Name"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="form-line">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                        <h4 class="modal-title">Delete Customer</h4>
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
      <script type="text/javascript">
          
     $('.editCoupon').click(function(){
     
    console.log('clicked');
      var id =$(this).attr('data-id');
      console.log(id);
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'get',
        url:'<?php echo e(route("ds.users.edit_form")); ?>',
        data: {id:id},
       
        success:function(response){
             $('#name').val(response.name);
             $('#email').val(response.email);
             $('#password').val(response.password);
             $('#user_id').val(response.id);

        }
    });
});
//////////////////delete all check rows////////////////

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
         var pathname = window.location.origin; 
         console.log(pathname);
    $.ajax({
        type:'get',
        url:'<?php echo e(route("ds.users.delete")); ?>',
       data: {
            "id": id // method and token not needed in data
        },
        success:function(response){
         console.log("sussce");    
        }
    });
  });
   $('#deleteEmployeeModal').modal('hide');
            $('div').removeClass('modal-backdrop');
            $("#tbody").load(" #tbody");
});

//////////////change status///////////

$(document).on('click','#change',function(){
      console.log("clicekd");
      var status =$('#status').val();
      
   $('.check_id').each(function () {
       var id = this.checked ? $(this).val() : "";
       console.log(id);
         $.ajaxSetup({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            });
         var pathname = window.location.origin; 
         console.log(pathname);
    $.ajax({
        type:'post',
        url:'<?php echo e(route("update-user-status")); ?>',
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
   $('#deleteEmployeeModal').modal('hide');
            $('div').removeClass('modal-backdrop');
            $("#tbody").load(" #tbody");
});

      </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/admin/customer/view.blade.php ENDPATH**/ ?>