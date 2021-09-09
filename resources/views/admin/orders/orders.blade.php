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
                                            {{-- <th>Action</th> --}}
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
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($orders as $key=>$order)
                                            <tr>
                                                <td><input type="checkbox" class="check_id form-control" id="checkbox{{$key}}"  value="{{$order->id}}">
                                                    <label for="checkbox{{$key}}"></label></td>
                                                <td>{{ $order->order_no }}</td>
                                                <td>{{ ucfirst($order->status) }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>{{ $order->city }}</td>
                                                <td>{{ $order->created_at->toDateString() }}</td>
                                                <td>
                                                    <a href="{{route('product.order.view',$order->id)}}">view Detail</a>
                                                    <a href="" data-id="{{ $order->id }}" class="preview btn btn-primary"><i class="material-icons">preview</i></a>
                                                    <a data-id="{{ $order->id }}" href="{{ route('order.print-order', ['id' => $order->id]) }}" title="Print Order" class="btn btn-primary btn-print"><i class="material-icons">print</i></a>
                                                </td>
                                                {{-- <td>
                                                    <a data-id="{{ $order->id }}" href="{{ route('ds.order-management.order-delete', ['id' => $order->id]) }}" title="View Order Detail" class="btn btn-primary preview"><i class="material-icons">delete</i></a>
                                                    {{-- <a data-id="{{ $order->id }}" href="{{ route('ds.order-management.order-delete', ['id' => $order->id]) }}" title="Ready To Ship" class="btn btn-primary preview"><i class="material-icons">local_shipping</i></a> --}}
                                                    {{-- <a data-id="{{ $order->id }}" href="{{ route('ds.order-management.order-delete', ['id' => $order->id]) }}" class="btn btn-primary delete"><i class="material-icons">delete</i></a> --}}
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
{{-- <script type="text/javascript" src="{{ asset('public/front/js/jquery-2.2.4.min.js')}}"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('public/front/js/bootstrap/bootstrap.min.js')}}"></script> --}}
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
                url:'{{route("update-order-a-status")}}',
            data: {
                    "id": id,
                    "status":status
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
<script>
    $(document).ready(function(){
      $('.btn-print').printPage();
    });
</script>
    <!-- Jquery Core Js -->
@endsection