@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ORDERS LIST</h2>
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
                                Order Management
                                <small>Orders List</small>
                            </h2>
                          
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product</th>
                                            <th>Vendor</th>
                                            
                                            <th>Order No</th>
                                             <th>Total Amount</th>
                                            <th>Remaining Amount</th>
                                            <th>Deduction</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Product</th>
                                            <th>Vendor</th>

                                            <th>Order No</th>
                                             <th>Total Amount</th>
                                            <th>Remaining Amount</th>
                                            <th>Deduction</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($userCommission)
                                        @foreach($userCommission as $data)
                                            <tr>
                                                <td><input type="checkbox" class="check_id form-control" id="checkbox"  value="">
                                                    <label for="checkbox"></label></td>
                                                    @if($data->produc!=[])
                                                <td>{{$data->product[0]->name}}</td>
                                                <td>{{$data->user[0]->name}}</td>
                                                @endif
                                                <td>{{$data->order_id}}</td>
                                                <td>{{$data->total}}</td>
                                                <td>{{$data->remaining_amount}}</td>
                                                <td>{{$data->deduction}}</td>
                                                 
                                                <td>
                                                    <!-- <a data-id="" href="#" class="btn btn-primary preview"><i class="material-icons">preview</i></a> -->
                                                    <a data-id="" href="{{route('ds.usercommission.delete',$data->id)}}" class="btn btn-primary delete"><i class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                       @endforeach
                                       @endif
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
$(document).on('click','#change',function(){
      console.log("clicekd");
      var status =$('#status').val();

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
        type:'post',
        url:'{{route("update-order-status")}}',
       data: {
            "id": id,
             "status":status
             // method and token not needed in data
        },
        success:function(response){
         console.log("sussce");    
        }
    });
  });
   
            $("#tbody").load(" #tbody");
});

</script>
    <!-- Jquery Core Js -->
   
    <script>
        $('.preview').on('click', function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                type: "GET",
                url: "{{ route('order.get-order-detail') }}",
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
@endsection