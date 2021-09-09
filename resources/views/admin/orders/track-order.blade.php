@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Track Shipment</h2>
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
                                Shipment Management
                                <small>Track Shipment</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix" style="margin-top: 10px;">
                                <div class="col-lg-12">
                                    <span class="heading"><b>Tracking Number: {{ $data['track_number'] }}</b></span>
                                    <hr style="border: 0.5px solid grey;margin-top:3px;">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4" style="text-align: center">
                                    <span>From</span>
                                    <h3>{{ $data['origin_city_name'] }}</h3>
                                </div>
                                <div class="col-lg-4" style="text-align: center">
                                    <img src="{{ asset('public/admin/images/van.png') }}" alt="" style="width: 220px;">
                                </div>
                                <div class="col-lg-4" style="text-align: center">
                                    <span>To</span>
                                    <h3>{{ $data['destination_city_name'] }}</h3>
                                </div>
                            </div>
                            <hr style="border: 0.5px solid grey;margin-top:3px;">
                            <div class="row clearfix">
                                <div class="col-lg-5" style="text-align: center">
                                    <table style="text-align: center" class="text-center">
                                        <tr>
                                            <th>Shipper Name:</th>
                                            <td>{{ $data['shipment_name_eng'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipper Address: </th>
                                            <td>{{ $data['shipment_address'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-2">
                                    
                                </div>
                                <div class="col-lg-5" style="text-align: center">
                                    <table>
                                        <tr>
                                            <th>Consignee Name:</th>
                                            <td>{{ $data['consignment_name_eng'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Consignee Address: </th>
                                            <td>{{ $data['consignment_address'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Activity Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Activity Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data['Tracking Detail'] as $arr)
                                            <tr>
                                                <td>{{ $arr['Activity_datetime'] }}</td>
                                                <td>{{ $arr['Status'] }}</td>
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

$(document).on('click','#change-status',function(){
      console.log("clicekd");
      var status =$('#a-status').val();
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
        url:'{{route("update-order-a-status")}}',
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