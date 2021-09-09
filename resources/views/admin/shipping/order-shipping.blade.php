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
                                                                <select name="driver_id"  id="driver_id" class="form-control show-tick ms">
                                                                    <option disabled="disabled" active >Select Driver</option>
                                                                    @foreach($drivers as $driver)
                                                                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                             <div class="col-lg-3">
                                                                <button type="submit" id="change" class="btn btn-default">Assign</button>
                                                            </div>
                                                    </div> </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Order#</th>
                                            <th>Customer</th>
                                            <th>City</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Order#</th>
                                            <th>Customer</th>
                                            <th>City</th>
                                             <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($orders as $key=>$order)
                                            <tr>
                                                <td><input type="checkbox" class="check_id form-control" id="checkbox{{$key}}"  value="{{$order->id}}">
                                                    <label for="checkbox{{$key}}"></label></td>
                                                <td>
                                                    <a href="" title="View Order Detail">{{ $order->order_no }}</a>
                                                </td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->city }}</td>
                                                <td>{{ $order->created_at->toDateString() }}</td>
                                                <td>{{ $order->status }}</td>
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
      var driver_id =$('#driver_id').val();

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
        url:'{{route("ds.shipping.placeShippment")}}',
       data: {
            "order_id": id,
             "driver_id":driver_id
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
                type: "post",
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