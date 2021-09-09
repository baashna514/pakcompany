@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PRODUCTS Comments</h2>
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
                                Comments Management
                                <small>Comments List</small>
                            </h2>
                                              
                              
                          
                           
                            <div class="row clearfix">
                                                         <div class="col-lg-7">
                                                                <select name="status" id="status" class="form-control show-tick ms" required="required">
                                                                    <option value="" disabled selected>Select Status</option>
                                                                    <option value="0">Not Approved</option>
                                                                   
                                                                    <option value="1">Approved</option>
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <button type="submit" id="change" class="btn btn-default">Change</button>
                                                       
                                                    </div>
                                                    <div class="col-lg-2">
                                                      <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons" >&#xE15C;</i> <span>Delete</span></a>
                                                    </div>
                            

                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table id="tbody" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                              <th></th>
                                            
                                            <th>Comment</th>
                                            <th>UserName</th>
                                            <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                              <th></th>
                                            <th>Comment</th>
                                            <th>UserName</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody >
                                        @foreach ($comments as $key=>$comment)
                                       
                                            <tr>

                                                <td style="border-color: black: ">
                                                
                                                    <input type="checkbox" class="check_id form-control" id="checkbox{{$key}}"  value="{{$comment->id}}">
                                                    <label for="checkbox{{$key}}"></label>
                                               
                                            </td>
                                                <td>
                                                    {{$comment->comment}}
                                                </td>
                                                <td>
                                                    {{$comment->comment}}
                                                </td>
                                                 @if ($comment->status == 0)
                                                    <td><span style="background: #eab804;padding: 5px;border-radius: 2px;">Not Approved</span></td>
                                                @endif
                                                @if ($comment->status == 1)
                                                    <td><span style="background: #058a1b;padding: 5px;border-radius: 2px; color:#fff;">Approved</span></td>
                                                @endif
                                                <td>
                                                    
                                                    <a href="{{ route('ds.comment.delete', ['id' => $comment->id]) }}" class="btn btn-primary"><i class="material-icons">delete</i></a>
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
    </section>
<script type="text/javascript">
    
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
        url:'{{route("ds.product-management.product-delete")}}',
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
        url:'{{route("update.comment.status")}}',
       data: {
            "id": id,
             "status":status
             // method and token not needed in data
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
</script>
    <!-- Jquery Core Js -->

@endsection
