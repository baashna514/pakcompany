@extends('admin.layout.master')
@section('content')

<h1>testubg</h1>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CATEGORIES LIST</h2>
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
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Category Management
                                <small>New Category</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('ds.product-management.categories-action') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="category">Name:</label>
                                                <input type="text" value="" name="name"q class="form-control" placeholder="Category Name"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- <div class="row clearfix">
                            <div class="col-sm-9">
                                <div class="form-group">
                                     <div class="form-line">
                                        <label for="attribute">Image:</label>
                                        <input type="file" value="" name="image" id="image" class="form-control" placeholder="Enter percentage"/>
                                </div>
                            </div>
                            
                        </div>
                        </div> -->
                                <button type="submit" class="btn btn-default">Submit</button>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Product Management
                                <small>Category List</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Name</th>
                                            <!-- <th>Image</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Name</th>
                                            <!-- <th>Image</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($categories as $key=>$cat)
                                        @php
                                            $index = $key + 1;
                                        @endphp
                                        <tr>
                                            <td>{{ $index }}</td>
                                            <td>{{ $cat->name }}</td>
                                          <!--   <td> <div class="thumbnail">
                                                        <img src="{{ asset('public/categories/').'/'.$cat->image}}" alt="" style="width: 60px;">
                                                    </div>
                                            </td> -->
                                            <td>
                                              <a   data-id="{{$cat->id}}" href="#" class="btn btn-primary editCoupon"><i  class="material-icons" data-toggle="modal"   data-target="#couponModal">edit</i></a> 
                                                <a href="{{ route('ds.product-management.category-delete', ['id' => $cat->id]) }}" class="btn btn-primary"><i class="material-icons">delete</i></a>
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
<!-- Edit Weight Modal -->
  <div class="modal fade" id="couponModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Category</h4>
        </div>
        
          <form action="{{ route('ds.categories.editPost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <input type="hidden" id="editCategoryId" name="id">
                        <div class="row clearfix">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="form-line">
                                       <label for="attribute">Category Name:</label>
                                        <input type="text" value="" name="name" id="name" class="form-control" placeholder="Enter coupon name"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row clearfix">
                            <div class="col-sm-9">
                                <div class="form-group">
                                     <div class="form-line">
                                        <label for="attribute">Image:</label>
                                        <input type="file" value="" name="image" id="image" class="form-control" placeholder="Enter percentage"/>
                                </div>
                            </div>
                            
                        </div>
                        </div> -->
                       
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
        url:'{{route("ds.categories.editForm")}}',
        data: {id:id},
       
        success:function(response){
             $('#name').val(response.name);
             $('#percent').val(response.image);
             $('#editCategoryId').val(response.id);
        }
    });
});
</script>
@endsection