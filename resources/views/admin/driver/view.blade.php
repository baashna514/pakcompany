@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Driver View</h2>
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
                    

<div id="City" class="tabcontent" style="display: block;">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="card">
                <div class="header">
                    <h2>
                        Driver Management
                        <small>Add New Driver</small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            {{-- <a href="{{ route('ds.product-management.new-product-form') }}" class="btn btn-primary">New Driver</a> --}}
                        </li>
                    </ul>
                </div>
                <div class="body">
                     <form action="{{ route('driver.create') }}" method="POST">
                        @csrf
                        <div class="row clearfix">
                            
                                    <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="form-line">
                                 <label for="attribute">Name:</label>
                                        <input type="text" value="" name="name" class="form-control" placeholder="Enter name"/>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="form-line">
                                 <label for="attribute">Phone:</label>
                                        <input type="text" value="" name="phone" class="form-control" placeholder="Enter phone"/>
                                </div>
                            </div>
                            
                        </div>
                        </div>

                         <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="form-line">
                                 <label for="attribute">Address:</label>
                                        <input type="text" value="" name="address" class="form-control" placeholder="Enter address"/>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
           <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Driver Management
                                <small>Driver List</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                              
                                              <th>Driver Name</th>
                                              <th>phone</th>
                                              <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                              
                                              <th>Driver Name</th>
                                              <th>phone</th>
                                              <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($driver)
                                        @foreach ($driver as $key=>$c)
                                      
                                        <tr>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $c->phone }}</td>
                                            <td>
                                                <a   data-id="{{$c->id}}" href="#" class="btn btn-primary editCity"><i  class="material-icons" data-toggle="modal"   data-target="#cityModal">edit</i></a> 
                                                <a href="{{route('driver.delete',$c->id)}}" class="btn btn-primary"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            No Data Found
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>

{{-- <div id="Weight" class="tabcontent">
     <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                         <div class="header">
                            <h2>
                                Weight Management
                                <small>New Weight</small>
                            </h2>
                        </div>
                        <div class="body">
                             <form action="{{ route('ds.shipping.setWeight') }}" method="POST">
                                @csrf
                               <div class="row clearfix">
                            
                                    <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="form-line">
                                 <label for="attribute">Name:</label>
                                        <input type="text" value="" name="name" class="form-control" placeholder="Enter name"/>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="form-line">
                                 <label for="attribute">Phone:</label>
                                        <input type="text" value="" name="phone" class="form-control" placeholder="Enter phone"/>
                                </div>
                            </div>
                            
                        </div>
                        </div>

                         <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="form-line">
                                 <label for="attribute">Address:</label>
                                        <input type="text" value="" name="address" class="form-control" placeholder="Enter address"/>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Weight Management
                                <small>Weight List</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                              <th>Min</th>
                                              <th>Max</th>
                                              <th>phone</th>
                                              <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                              <th>Min</th>
                                              <th>Max</th>
                                              <th>phone</th>
                                              <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($weight)
                                        @foreach ($weight as $key=>$w)
                                      
                                        <tr>
                                            <td>{{ $w->min }}</td>
                                            <td>{{ $w->max }}</td>
                                            <td>{{ $w->phone }}</td>
                                            <td>
                                                 <a   data-id="{{$w->id}}" href="#" class="btn btn-primary editWeight"><i  class="material-icons" data-toggle="modal"   data-target="#weightModal">edit</i></a> 
                                                <a href="{{route('ds.shipping.delWeight',$w->id)}}" class="btn btn-primary"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            No Data Found
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
  
</div> --}}
<!-- Modal -->
  <div class="modal fade" id="cityModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Driver Profile</h4>
        </div>
        <div class="modal-body">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <form id="edit" action="{{ route('driver.edit-post') }}" method="POST">
                        @csrf
                        <input type="hidden" id="editCityId" name="id">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="attribute">Name</label>
                                       <input type="text" id="name" value="" name="name" class="form-control" placeholder="Enter phone"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="attribute">phone:</label>
                                            <input type="text" id="phone" value="" name="phone" class="form-control" placeholder="Enter phone"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="attribute">Address:</label>
                                            <input type="text" id="address" value="" name="address" class="form-control" placeholder="Enter phone"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>  
                    </form>
                </div>
            </div>
        </div>
      </div>


            </div>
            <!-- #END# Exportable Table -->
        </div>

  <!-- Edit Weight Modal -->
  <div class="modal fade" id="weightModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Weight</h4>
        </div>
         <form id="edit" action="{{ route('ds.shipping.editWeight') }}" method="POST">
                                @csrf
                                <input type="hidden" id="editWeightId" name="id">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="attribute">Min</label>
                                                <input type="number" id="min" value="" name="min" class="form-control" placeholder="Enter Minimum range"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="attribute">Max</label>
                                                <input type="number" id="max" value="" name="max" class="form-control" placeholder="Enter Maximum range"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <div class="form-line">
                                         <label for="attribute">phone:</label>
                                                <input type="text" id="wphone" value="" name="phone" class="form-control" placeholder="Enter phone"/>
                                        </div>
                                    </div>
                                    
                                </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <div class="form-line">
                                                <button type="submit" class="btn btn-primary">Submit</button>  
                                              </div>
                                         </div>
                                    </div>
                                </div>
                              </form>
      </div>


            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
$('.editWeight').click(function(){
     console.log("clicked");
      var id =$(this).attr('data-id');
     console.log(id);
     

     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'get',
        url:'shipping/editWeight-form/'+id,
        
        success:function(response){
          console.log(response);

             $('#min').val(response.min);
             $('#max').val(response.max);
             $('#wphone').val(response.phone);
            
             $('#editWeightId').val(response.id);
        }
    });
});
$('.editCity').click(function(){
     
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
        url:'{{route("driver.edit-form")}}',
       data:{id:id},
        success:function(response){
                 console.log(response.name);
             $('#name').val(response.name);

             $('#phone').val(response.phone);
             $('#address').val(response.address);
            
             $('#editCityId').val(response.id);
        }
    });
});

</script>
    <!-- Demo Js -->
    <script src="{{asset('public/admin/js/demo.js')}}"></script>
@endsection