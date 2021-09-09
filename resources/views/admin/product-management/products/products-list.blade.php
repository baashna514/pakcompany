@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PRODUCTS LIST</h2>
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
                                Product Management
                                <small>Products List</small>
                            </h2>
                            <div class="row clearfix" style="margin-bottom: 10px;margin-top: 10px;">
                                <div class="col-lg-4">
                                    <form action="{{ route('export.product') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" class="form-control">
                                    </form>
                                    <button class="btn btn-success" style="margin-top: 10px;">Import User Data</button>
                                </div>
                                @if(Auth::user()->is_admin==1)
                                <div class="col-lg-4">
                                    <select name="status" id="status" class="form-control show-tick ms" required="required">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="0">Not Approved</option>
                                        <option value="1">Approved</option>
                                    </select>
                                    <button type="submit" id="change" class="btn btn-default" style="margin-top: 10px;">Change</button>
                                </div>
                                @endif
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
                                    @if(Auth::user()->is_admin==1)
                                        <li class="dropdown">
                                            <a href="{{ route('ds.product-management.new-product-form') }}" class="btn btn-primary">New Product</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                                            <th style="width: 100px;">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody >
                                        @foreach ($products as $key=>$product)
                                        @php
                                            $id = ($product->id);
                                            $index = $key + 1;
                                        @endphp
                                            <tr>
                                                <td style="border-color: black: ">
                                                
                                                    <input type="checkbox" class="check_id form-control" id="checkbox{{$key}}"  value="{{$product->id}}">
                                                    <label for="checkbox{{$key}}"></label>
                                               
                                            </td>
                                                <td>
                                                    <div class="thumbnail">
                                                        @if($product->integration_id)
                                                            @if (strpos($product->p_thumbnail, 'daraz.pk') !== false)
                                                                <img src="{{ $product->p_thumbnail }}" class="img-1 img-responsive" alt="image" style="width: 60px">
                                                            @else
                                                                <img src="{{ asset('public/thumbnail/').'/'.$product->p_thumbnail }}" class="img-1 img-responsive" alt="image" style="width: 60px">
                                                            @endif
                                                        @else
                                                            <img src="{{ asset('public/thumbnail/').'/'.$product->p_thumbnail }}" class="img-1 img-responsive" alt="image" style="width: 60px">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->price }}</td>
                                                @if ($product->stock ==0)
                                                    <td><span style="background: #d80000;padding: 5px;border-radius: 2px;font-size: 11px;color:#fff;">out of stock</span></td>
                                                @else
                                                    <td><span style="background: #058a1b;padding: 5px;border-radius: 2px; color:#fff; font-size: 11px;">in stock</span></td>
                                                @endif
                                                @if ($product->is_featured == FALSE)
                                                    <td><span style="background: #eab804;padding: 5px;border-radius: 2px;font-size: 11px;">NO</span></td>
                                                @endif
                                                @if ($product->is_featured == TRUE)
                                                    <td><span style="background: #058a1b;padding: 5px;border-radius: 2px; color:#fff;font-size: 11px;">YES</span></td>
                                                @endif
                                                <td>
                                                    <a href="{{ route('ds.product-management.edit-product-form', ['id' => $id]) }}" class="btn btn-primary"><i class="material-icons">edit</i></a><br>
                                                    <a href="{{ route('ds.product-management.product-delete', ['id' => $id]) }}" class="btn btn-primary"><i class="material-icons">delete</i></a>
                                                    <a href="#" data-id="{{$product->id}}" class="btn btn-primary btn-quick-edit"><i class="material-icons">edit_road</i></a>
                                                    {{-- <a href="{{route('view.comment',$product->id)}}">View Comments</a> --}}
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
    
    <div id="getProductQuickViewDataModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header" style="background: #cecece;height: 70px;">
                <h4 class="modal-title">Product Detail</h4>
                <button type="button" class="close" data-dismiss="modal" style="margin-top: -24px;">&times;</button>
            </div>
            <div class="modal-body" id="showProductQuickViewData">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    </section>
<script type="text/javascript">

// $('.btn-quick-edit').click(function(e){
//     e.preventDefault();
//     var id = $(this).attr('data-id'); 
// });
$('.btn-quick-edit').on('click', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        type: "GET",
        url: "{{ route('product.get-product-quick-detail') }}",
        data: {id:id},
        success: function(data){
            // alert(data);
            document.querySelector("#showProductQuickViewData").innerHTML = (data);
            $('#getProductQuickViewDataModal').modal('show');
        },
        error: function(data){
            alert('Error...!');
        }
    });
});

$("#showProductQuickViewData").on('click', '#update-product', function(e){
    e.preventDefault();
    var id = $('#product-id').val();
    var product = $('#product').val();
    var price = $('#price').val();
    var stock = $('input[name="stock"]:checked').val();
    $.ajax({
        url: "{{route('product.update-product-quick-detail')}}",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            id:id,
            product:product,
            price:price,
            stock:stock,
        },
        success:function(data){
            // alert(data);
            $('#getProductQuickViewDataModal').modal('hide');
            window.location.reload();
            // $("#tbody").load(" #tbody");
        },
        error: function(data){
            alert('Error...!');
        }
    });
});

// $("#showProductQuickViewData").on('submit', '#update-product-quick-detail-form', function(e){
// // $("#update-product-quick-detail-form").submit(function(e) {
//     e.preventDefault();
//     var form = $(this);
//     var url = form.attr('action');
//     $.ajax({
//         type: "POST",
//         url: url,
//         data: form.serialize(),
//         success: function(data){
//             alert(data);
//         }
//     });
// });
    
$(document).on('click','#deleteAll',function(){
      
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
   
@endsection
