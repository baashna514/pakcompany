@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CLAIM LIST</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="" style="margin-bottom: 20px;">
                            @include('admin.layout.messages')
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
                                Claim Management
                                <small>Claim List</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Customer</th>
                                            <th>Order#</th>
                                            <th>Reason</th>
                                            <th>Dscription</th>
                                            <th>Images</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Customer</th>
                                            <th>Order#</th>
                                            <th>Reason</th>
                                            <th>Dscription</th>
                                            <th>Images</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($claims as $key=>$claim)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $claim->user['name'] }}</td>
                                                <td>{{ $claim->order_no }}</td>
                                                <td>{{ $claim->reason }}</td>
                                                <td>{{ $claim->description }}</td>
                                                <td>
                                                    @foreach ($claim->claim_gallery as $item)
                                                        <li><img src="{{ asset('public/Claims/').'/'.$item->image }}" alt="" style="width: 50px;"></li>
                                                    @endforeach
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
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
        url:'{{route("ds.product-management.product-delete")}}',
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
            url:'{{route("update-product-status")}}',
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
            url:'{{route("update-featured-product")}}',
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
    <!-- Jquery Core Js -->

@endsection
