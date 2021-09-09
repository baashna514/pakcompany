@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Vehicle Management</h2>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Vehicle Management
                        <small>Add New Vehicle</small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            {{-- <a href="{{ route('ds.product-management.new-product-form') }}" class="btn btn-primary">New Driver</a> --}}
                        </li>
                    </ul>
                </div>
                <div class="body">
                     <form action="{{ route('vehical.create') }}" method="POST">
                        @csrf
                       <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Make</label>
                                   <input type="text" id="make"  name="make" class="form-control" placeholder="Enter Brand"/>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Model:</label>
                                        <input type="text" id="model"  name="model" class="form-control" placeholder="Enter Model"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Color:</label>
                                        <input type="text" id="color"  name="color" class="form-control" placeholder="Enter Color"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Register Year:</label>
                                        <input type="text" id="r_year"  name="r_year" class="form-control" placeholder="Enter Register Year"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Register Number:</label>
                                        <input type="text" id="r_number"  name="r_number" class="form-control" placeholder="Enter Register Number"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Status:</label>
                                        <input type="text" id="status"  name="status" class="form-control" placeholder="Enter Status"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Type:</label>
                                        <input type="text" id="address"  name="type" class="form-control" placeholder="Enter Type"/>
                                </div>
                            </div>
                        </div>
                              
                            <div class="col-sm-6">
                                {{-- <div class="form-group"> --}}
                                    {{-- <div class="form-line"> --}}
                                        <label for="category">Select Driver:</label>
                                        <select name="driver_id"  class="form-control show-tick ms category" id="category" required>
                                            @if($drivers)

                                                <option  disabled selected>Select Driver</option>
                                                @foreach($drivers as $driver)
                                             
                                                <option value="{{$driver->id}}">{{$driver->name}}</option>
                                                @endforeach
                                             @endif
                                             </select>
                                    {{-- </div> --}}
                                {{-- </div> --}}
                            </div>

                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                              
                                              <th>Vehical Model</th>
                                              <th>Vehical Make</th>
                                              <th>Register Number</th>
                                              <th>Type</th>
                                              <th>Status</th>
                                              <th>Driver</th>
                                              <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                              
                                               <th>Vehical Model</th>
                                              <th>Vehical Make</th>
                                              <th>Register Number</th>
                                              <th>Type</th>
                                              <th>Status</th>
                                              <th>Driver</th>
                                              <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($Vehical)
                                        @foreach ($Vehical as $key=>$c)
                                      
                                        <tr>
                                            <td>{{ $c->model }}</td>
                                            <td>{{ $c->make }}</td>
                                            <td>{{ $c->r_number }}</td>
                                            <td>{{ $c->type }}</td>
                                            <td>{{ $c->status }}</td>
                                            <td>{{ $c->driver->name}}</td>
                                            <td>
                                                <a   data-id="{{$c->id}}" href="#" class="btn btn-primary editCity"><i  class="material-icons" data-toggle="modal"   data-target="#cityModal">edit</i></a> 
                                                <a href="{{route('vehical.delete',$c->id)}}" class="btn btn-primary"><i class="material-icons">delete</i></a>
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

</div> --}}
<!-- Modal -->
  <div class="modal fade" id="cityModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Vehical</h4>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <form id="edit" action="{{ route('vehical.edit-post') }}" method="POST">
                    @csrf
                    <input type="hidden" id="editCityId" name="id">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Make</label>
                                   <input type="text"  name="make" class="make form-control" placeholder="Enter phone"/>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Model:</label>
                                        <input type="text"   name="model" class="form-control model" placeholder="Enter Model"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Color:</label>
                                        <input type="text" id="color"  name="color" class="form-control color" placeholder="Enter Color"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Register Year:</label>
                                        <input type="text" id="r_year"  name="r_year" class="form-control r_year" placeholder="Enter Register Year"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Register Number:</label>
                                        <input type="text" id="r_number"  name="r_number" class="form-control r_number" placeholder="Enter Register Number"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Status:</label>
                                        <input type="text" id="status"  name="status" class="form-control status" placeholder="Enter Status"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Type:</label>
                                        <input type="text" id="address"  name="type" class="form-control type" placeholder="Enter Type"/>
                                </div>
                            </div>
                        </div>
                         
                            <div class="col-sm-6">
                                {{-- <div class="form-group"> --}}
                                    {{-- <div class="form-line"> --}}
                                        <label for="category">Select Driver:</label>
                                        <select name="driver_id"  class="form-control show-tick ms category driver_id" id="driver_id" required>
                                            @if($drivers)

                                                <option  disabled selected>Select Driver</option>
                                                @foreach($drivers as $driver)
                                                
                                                <option value="{{$driver->id}}">{{$driver->name}}</option>
                                               
                                                @endforeach
                                             @endif
                                             </select>
                                    {{-- </div> --}}
                                {{-- </div> --}}
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
      </div>


            </div>
            <!-- #END# Exportable Table -->
        </div>

  <!-- Edit Weight Modal -->
  <div class="modal fade" id="weightModal" role="dialog">
   
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
        url:'{{route("vehical.edit-form")}}',
       data:{id:id},
        success:function(response){
            console.log(response);
            console.log(response.make);
             $('.make').val(response.make);
             $('.model').val(response.model);
             $('.status').val(response.status);
             $('.color').val(response.color);
             $('.r_number').val(response.r_number);
             $('.r_year').val(response.r_year);
             $('.type').val(response.type);
             $(".driver_id").val(response.driver_id).prop('selected',true);
             $('#editCityId').val(response.id);
        }
    });
});

</script>
    <!-- Demo Js -->
    <script src="{{asset('public/admin/js/demo.js')}}"></script>
@endsection