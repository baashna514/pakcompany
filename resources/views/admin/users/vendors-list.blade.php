@extends('admin.layout.master')
@section('content')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Vendors LIST</h2>
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
                <div class="col-lg-12">
                    <form action="{{route('user.offline')}}" method="post">
                        @csrf
                         <div class="row clearfix">
                            <div class="col-lg-4">
                                <select name="offline" id="offline-status" class="form-control show-tick ms" required="required">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="0">Offline</option>
                                    <option value="1">Online</option>
                                </select>
                              </div>
                            <div class="col-lg-4">

                                    <select name="days" id="offline-days" class="form-control show-tick ms" required="required">
                                    <option value="" disabled selected>Select Days</option>
                                    <option value="7-Days">7-Days</option>
                                    <option value="14-Days">14-Days</option>
                                    <option value="30-Days">30-Days</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" id="btn-offline" class="btn btn-default">Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br><br>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Vendors Management
                                <small>Vendors List</small>
                            </h2>
                        </div>
                           
                        
                        <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='https://media1.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif?cid=ecf05e47fwx7u0gjt32cptghk62ieoo3ea3a57ho8uwzcc2m&rid=giphy.gif' width="64" height="64" /><br>Loading..</div>
                        <div class="body">
                            <div class="row clearfix">                    
                                <div class="col-lg-4">
                                    <select name="status" id="status" class="form-control show-tick ms" required="required">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="0">Not Registered</option>
                                        <option value="1">Registered</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-default" id="change">Change</button>
                                </div>
                                 <div class="col-lg-3">
                                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons" >&#xE15C;</i> <span>Delete</span></a>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table  id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                        
                                            <th>SR#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profile</th>
                                            <th>Status</th>
                                            <th>Active Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profile</th>
                                            <th>Status</th>
                                            <th>Active Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($users)
                                        @foreach ($users as $key=>$user)
                                        @php
                                            $index = $key + 1;
                                        @endphp
                                        <tr>
                                            <td style="border-color: black: ">
                                                
                                                    <input type="checkbox" class="check_id form-control" id="checkbox{{$key}}"  value="{{$user->id}}">
                                                    <label for="checkbox{{$key}}"></label>
                                               
                                            </td>
                                            <td>{{ $user->name }}</td>
                                             <td>{{$user->email}}</td>
                                             <td><a href="{{route('user.profiles',$user->id)}}"> View Profile</a></td>
                                             <!-- <td><a href="{{route('ds.view.orders',$user->id)}}"> View Orders</a></td>
                                            </td> -->
                                                @if ($user->status == 0)
                                                    <td><span style="background: #eab804;padding: 5px;border-radius: 2px;">Not Registered</span></td>
                                                @endif
                                                @if ($user->status == 1)
                                                    <td><span style="background: #058a1b;padding: 5px;border-radius: 2px; color:#fff;">Registered</span></td>
                                                @endif
                                                
                                                    @if ($user->offline == 0)
                                                    <td><span style="background: #eab804;padding: 5px;border-radius: 2px;">Offline({{$user->days}})</span></td>
                                                @endif
                                                @if ($user->offline == 1)
                                                    <td><span style="background: #058a1b;padding: 5px;border-radius: 2px; color:#fff;">Online</span></td>
                                                @endif
                                                
                                            <td>
                                              <a   data-id="{{$user->id}}" href="#" class="btn btn-primary editCoupon"><i  class="material-icons" data-toggle="modal"   data-target="#couponModal">edit</i></a> 
                                                <a href="{{ route('ds.users.delete', ['id' => $user->id]) }}" class="btn btn-primary"><i class="material-icons">delete</i></a>
                                            </td>
                                            
                                        </tr>
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
        
          <form action="{{ route('ds.users.edit_action') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <input type="hidden" id="user_id" name="id">
                          <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="category">Name:</label>
                                                <input type="text" value="" id="name" name="name" class="form-control" placeholder="Category Name"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="category">Email:</label>
                                                <input type="email" value="" id="email" name="email" class="form-control" placeholder="Category Name"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="category">Password:</label>
                                                <input type="password" id="
                                                password" value="" name="password" class="form-control" placeholder="Category Name"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       
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
        <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Delete Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="button" id="deleteAll" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
      <script type="text/javascript">
      
    //   Offline Status
    $('#btn-offline').on('click',function(e){
        e.preventDefault();
      var offline_status =$('#offline-status').val();
      var offline_days =$('#offline-days').val();
      
       $('.check_id').each(function (){
           var id = this.checked ? $(this).val() : "";
           console.log(id);
             $.ajaxSetup({
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                });
             var pathname = window.location.origin; 
             console.log(pathname);
        $.ajax({
            type:'post',
            url:'{{route("user.offline")}}',
           data: {
                "id": id,
                "offline":offline_status,
                'days':offline_days
                 // method and token not needed in data
            },
            success:function(response){
             $("#tbody").load(" #tbody");  
            }
        });
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
        url:'{{route("ds.users.edit_form")}}',
        data: {id:id},
       
        success:function(response){
             $('#name').val(response.name);
             $('#email').val(response.email);
             $('#password').val(response.password);
             $('#user_id').val(response.id);

        }
    });
});
//////////////////delete all check rows////////////////

$(document).on('click','#deleteAll',function(){
      console.log("clicekd");
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
        type:'get',
        url:'{{route("ds.users.delete")}}',
       data: {
            "id": id // method and token not needed in data
        },
        success:function(response){
         console.log("sussce");    
        }
    });
  });
   $('#deleteEmployeeModal').modal('hide');
            $('div').removeClass('modal-backdrop');
            $("#tbody").load(" #tbody");
});

//////////////change status///////////

$(document).on('click','#change',function(){
      console.log("clicekd");
      var status =$('#status').val();
      
   $('.check_id').each(function () {
       var id = this.checked ? $(this).val() : "";
       console.log(id);
         $.ajaxSetup({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            });
         var pathname = window.location.origin; 
         console.log(pathname);
    $.ajax({
        type:'post',
        url:'{{route("update-user-status")}}',
       data: {
            "id": id,
            "status":status
             // method and token not needed in data
        },
        success:function(response){
         console.log("sussce");  
         $("#tbody").load(" #tbody");  
        }
    });
  });
   $('#deleteEmployeeModal').modal('hide');
            $('div').removeClass('modal-backdrop');
            $("#tbody").load(" #tbody");
});
 $(document).ready(function(){
$(document).ajaxStart(function(){
    $("#wait").css("display", "block");
  });
  $(document).ajaxComplete(function(){
    $("#wait").css("display", "none");
  });
});
      </script>
@endsection