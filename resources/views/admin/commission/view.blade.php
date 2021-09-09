@extends('admin.layout.master')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Commission View</h2>
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
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="header">
                    <h2>
                        Commission Management
                        <small>Add New Shipping</small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            {{-- <a href="#" class="btn btn-primary">New City</a> --}}
                        </li>
                    </ul>
                </div>
                <div class="body">
                     <form action="{{route('ds.commission.create')}}" method="POST">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                {{-- <div class="form-group"> --}}
                                    {{-- <div class="form-line"> --}}
                            
                                   <select class="selectpicker" name="vendor_id[]" multiple data-live-search="true">
                                    @if($vendors)
                                    @foreach($vendors as $cat)
                                     <option style="
                                        margin-left: 24px;
                                    " value="{{$cat->id}}"> {{$cat->name}}</option>
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
                                     <div class="form-line">
                                 <label for="attribute">Price:</label>
                                        <input type="text" value="" name="percentage" class="form-control" placeholder="Enter price"/>
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
                                Commission Management
                                <small>Commission List</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                              
                                              <th>Category ID</th>
                                              <th>Percentage</th>
                                              <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                              
                                                <th>Category ID</th>
                                              <th>Percentage</th>
                                              <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($commission)
                                        @foreach($commission as $com)
                                        <tr>
                                            <td>{{$com->user[0]->name}}</td>
                                            <td>{{$com->percentage}}</td>
                                            <td>
                                                <a   data-id="" href="#" class="btn btn-primary editCity"><i  class="material-icons" data-toggle="modal"   data-target="#cityModal">edit</i></a> 
                                                <a href="{{route('ds.commission.delete',$com->id)}}" class="btn btn-primary"><i class="material-icons">delete</i></a>
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

<!-- Modal -->
  <div class="modal fade" id="cityModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit City</h4>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <form id="edit" action="#" method="POST">
                    @csrf
                    <input type="hidden" id="editCityId" name="id">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Name</label>
                                    <select name="name" id="name" class="form-control" required>
                                    <option value="" disabled selected>Select The City</option>
                                    <option value="Islamabad">Islamabad</option>

                                    </select>
                                </div>
                            </div>
                        </div>
        
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="attribute">Price:</label>
                                        <input type="text" id="cPrice" value="" name="price" class="form-control" placeholder="Enter price"/>
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
      </div>


            </div>
            <!-- #END# Exportable Table -->
        </div>

 
    </section>

    
<script>
 // Material Select Initialization
$('select').selectpicker();
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
             $('#wPrice').val(response.price);
            
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
        url:'shipping/editCity-form/'+id,
       
        success:function(response){
                 console.log(response.name);
             $('#name').val(response.name);

             $('#cPrice').val(response.price);
            
             $('#editCityId').val(response.id);
        }
    });
});

</script>
    <!-- Demo Js -->
    <script src="{{asset('public/admin/js/demo.js')}}"></script>
@endsection