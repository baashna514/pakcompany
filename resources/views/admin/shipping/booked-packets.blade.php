@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BOOKED PACKETS LIST</h2>
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
                                Shipping Management
                                <small>Booked Packets</small>
                            </h2>
                            {{-- <ul class="header-dropdown m-r--5">
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
                            </ul> --}}
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>OrderID</th>
                                            <th>Shipment Type</th>
                                            <th>CN#</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Shipper</th>
                                            <th>Consignee</th>
                                            <th>Phone 1</th>
                                            <th>Email</th>
                                            <th>Booking Date</th>
                                            <th>Amount(PKR)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>OrderID</th>
                                            <th>Shipment Type</th>
                                            <th>CN#</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Shipper</th>
                                            <th>Consignee</th>
                                            <th>Phone 1</th>
                                            <th>Email</th>
                                            <th>Booking Date</th>
                                            <th>Amount(PKR)</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $arr= array(); ?>
                                        @foreach ($packets as $data)
                                            <?php $arr[] = $data ?>
                                            @foreach ($arr as $key=>$packet)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>Pickup Request not Send</td>
                                                        <td>ORDER#73394</td>
                                                        <td>Overnight</td>
                                                        <td>LE784151154	</td>
                                                        <td>Lahore</td>
                                                        <td>Lahore</td>
                                                        <td>F STYLE	</td>
                                                        <td>SUFI</td>
                                                        <td>0015054499</td>
                                                        <td>sufianahmed14239@gmail.com</td>
                                                        <td>17 Mar, 2021</td>
                                                        <td>PKR 660.00</td>
                                                        <td>
                                                            <a data-id="" href="" class="btn btn-primary preview"><i class="material-icons">print</i></a>
                                                        </td>
                                                    </tr>
                                            @endforeach
                                        @endforeach
                                        <?php print_r($packet[0]); ?>
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