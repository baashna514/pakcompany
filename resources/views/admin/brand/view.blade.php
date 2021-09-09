@extends('admin.layout.master')
@section('content')

<h1>testubg</h1>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BRANDS LIST</h2>
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
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Brands Management
                                <small>New Brand</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('ds.product-management.brands-action')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                 <div class="row clearfix">
                            <div class="col-sm-12">
                                {{-- <div class="form-group"> --}}
                                    {{-- <div class="form-line"> --}}
                                        <label for="category">Select Category:</label>
                                        <select name="cat_id"  class="form-control show-tick ms category" id="category" required>
                                            @if($category)

                                                <option value="" disabled selected>Select Category</option>
                                                @foreach($category as $cat)
                                             
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                             @endif
                                             </select>
                                    {{-- </div> --}}
                                {{-- </div> --}}
                            </div>

                        </div>
                         <div class="row clearfix">
                            <div class="col-sm-12">
                                 <div class="form-group"> 
                                    {{-- <div class="form-line"> --}}
                                        <label for="category">Select SubCategory:</label>
                                        <select name="subcategory_id"  class="form-control show-tick ms select2 subcategory" required>
                                            @if($subcategory)

                                                <option  value="" class="disabled" disabled selected>Select Subcategory</option>
                                                @foreach($subcategory as $subcat)
                                             
                                                <option id="subcategoryOption" value="{{$subcat->id}}">{{$subcat->name}}</option>
                                                @endforeach
                                             @endif
                                             </select>
                                    {{-- </div> --}}
                                </div>
                            </div>

                        </div>
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
                            <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Brand Management
                                <small>Brand List</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Name</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Category</th>
                                            <th>SubCategory</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Name</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Category</th>
                                            <th>SubCategory</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($brand)
                                        @foreach ($brand as $key=>$b)
                                        @php
                                            $index = $key + 1;
                                        @endphp
                                        @if($b->category!=null && $b->subcategory!=null)
                                        <tr>
                                            <td>{{ $index }}</td>
                                            <td>{{ $b->name }}</td>
                                            <td>{{$b->category->name}}</td>
                                            <td>{{$b->subcategory->name}}</td>
                                            <td>
                                              <a   data-id="{{$b->id}}" href="#" class="btn btn-primary editCoupon"><i  class="material-icons" data-toggle="modal"   data-target="#couponModal">edit</i></a> 
                                                <a href="{{ route('ds.product-management.brand-delete', ['id' => $b->id]) }}" class="btn btn-primary"><i class="material-icons">delete</i></a>
                                            </td>
                                            
                                        </tr>
                                        @endif
                                        @endforeach
                                        @else
                                        <tr>
                                            <td>No Data</td>
                                        </tr>
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
<!-- Edit Weight Modal -->
  <div class="modal fade" id="couponModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Category</h4>
        </div>
        
          <form action="{{ route('ds.brand.editPost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <input type="hidden" id="editCategoryId" name="id">
                          
                         <div class="row clearfix">
                            <div class="col-sm-12">
                                {{-- <div class="form-group"> --}}
                                    {{-- <div class="form-line"> --}}
                                        <label for="category">Select Category:</label>
                                        <select name="cat_id"  class="form-control show-tick ms category" id="category_id" required>
                                            @if($category)

                                                <option value="" disabled selected>Select Category</option>
                                                @foreach($category as $cat)
                                             
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                             @endif
                                             </select>
                                    {{-- </div> --}}
                                {{-- </div> --}}
                            </div>

                        </div>
                         <div class="row clearfix">
                            <div class="col-sm-12">
                                 <div class="form-group"> 
                                    {{-- <div class="form-line"> --}}
                                        <label for="category">Select SubCategory:</label>
                                        <select name="subcategory_id"  id="subcategory_id"  class="form-control show-tick ms select2 subcategory" required>
                                            @if($subcategory)

                                                <option  value="" class="disabled" disabled selected>Select Subcategory</option>
                                                @foreach($subcategory as $subcat)
                                             
                                                <option id="subcategoryOption" value="{{$subcat->id}}">{{$subcat->name}}</option>
                                                @endforeach
                                             @endif
                                             </select>
                                    {{-- </div> --}}
                                </div>
                            </div>

                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="form-line">
                                       <label for="attribute">Brand Name:</label>
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
            $('.category').on('change', function() {
              var cat_id=this.value;
              $.ajax({
            type:'get',
            url:'{{route("ds.getSubcategoriesByCategory")}}',
            data: {id:cat_id},
           
            success:function(response){
                
             $('.subcategory option').remove();
             $(".subcategory").append('<option  value="" class="disabled" disabled selected>Select Subcategory</option>');
            
             $.each(response,function(key, value)
                {
                    $(".subcategory").append('<option id="subcategoryOption" value=' + value.id + '>' + value.name + '</option>');
                });
        }
    });
            });
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
        url:'{{route("ds.brand.editForm")}}',
        data: {id:id},
       
        success:function(response){
             $('#name').val(response.name);
             $("#category_id").val(response.category_id).prop('selected',true); 
              $.ajax({
            type:'get',
            url:'{{route("ds.getSubcategoriesByCategory")}}',
            data: {id:response.category_id},
           
            success:function(response){
                
             $('.subcategory option').remove();
             $(".subcategory").append('<option  value="" class="disabled" disabled selected>Select Subcategory</option>');
            console.log("undesstororkas");
             $.each(response,function(key, value)
                {
                    $(".subcategory").append('<option id="subcategoryOption" value=' + value.id + '>' + value.name + '</option>');

                });
              // $(".subcategory").val(response.subcategory_id).prop('selected',true);
        }
    });
             $(".subcategory").val(response.subcategory_id).prop('selected',true); 
             $('#percent').val(response.image);
             $('#editCategoryId').val(response.id);
        }
    });
});
</script>
@endsection