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
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   <div class="row clearfix">
                                        <div class="col-lg-7">
                                            <select name="status"  id="status" class="form-control show-tick ms">
                                                <option disabled="disabled" active >Select Status</option>
                                                <option value="Complete">Complete</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" id="change" class="btn btn-default">Change</button>
                                        </div>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Order</th>
                                            <th>Product</th>
                                            <th>Customer</th>
                                            <th>City</th>
                                            <th>Date</th>
                                            <th>View Details</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Order</th>
                                            <th>Product</th>
                                            <th>Customer</th>
                                            <th>City</th>
                                            <th>Date</th>
                                            <th>View Details</th>

                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($orders as $key=>$order)
                                            <tr>
                                                <td><input type="checkbox" class="check_id form-control" id="checkbox{{$key}}"  value="{{$order->id}}">
                                                    <label for="checkbox{{$key}}"></label></td>
                                                <td>{{ $order->order_no }}</td>
                                                <td>{{ $order->product }}</td>
                                                <td>{{ $order->user['name'] }}</td>
                                                <td>{{ $order->city }}</td>
                                                <td>{{ $order->created_at->toDateString() }}</td>
                                                <td><a href="{{route('product.order.view',$order->id)}}">view Detail</a></td>
                                                @if ($order->status == 'Pending')
                                                    <td><span style="background: #eab804;padding: 5px;border-radius: 2px;">{{ $order->status }}</span></td>
                                                @endif
                                                @if ($order->status == 'Complete')
                                                    <td><span style="background: #058a1b;padding: 5px;border-radius: 2px; color:#fff;">{{ $order->status }}</span></td>
                                                @endif
                                                <td>
                                                    <a data-id="{{ $order->id }}" href="{{ route('ds.order-management.order-delete', ['id' => $order->id]) }}" class="btn btn-primary preview"><i class="material-icons">preview</i></a>
                                                    <a data-id="{{ $order->id }}" href="{{ route('ds.order-management.order-delete', ['id' => $order->id]) }}" class="btn btn-primary delete"><i class="material-icons">delete</i></a>
                                                </td>
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
         $("#tbody").load(" #tbody");
        }
    });
  });
   
            
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