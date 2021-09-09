@extends('admin.layout.master')
@section('content')

  <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="{{asset('public/vendor/'.$user->user_image)}}" style="width: 110px;"/>
                            </div>
                            <div class="content-area">
                                <h3>{{$user->name}}</h3>
                               <!--  <p>Web Software Developer</p>
                                <p>Administrator</p> -->
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Phone</span>
                                    <span>{{$user->phone}}</span>
                                </li>
                                <li>
                                    <span>email</span>
                                    <span>{{$user->email}}</span>
                                </li>
                                <li>
                                    <span>Address</span>
                                    <span>{{$user->address1}}</span>
                                </li>
                                {{-- <li>
                                    <span>Shop Name</span>
                                    <span>{{$user->shop_name}}</span>
                                </li> --}}
                                <li>
                                    <span>Country</span>
                                    <span>{{$user->country}}</span>
                                </li>
                            </ul>
                            
                        </div>
                    </div>

                  
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                        <form class="form-horizontal" action="{{route('profile.update',$user->id)}}" method="post"  enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group required" style="display: none;">
                                            <label class="col-sm-2 control-label">Customer Group</label>
                                            <div class="col-sm-10">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="customer_group_id" value="1" checked="checked"> Default
                                                    </label>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label" for="input-firstname">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" value="{{$user->name}}" id="input-firstname" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" value="{{$user->email}}" placeholder="E-Mail" id="input-email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label" for="input-telephone">Phone</label>
                                                <div class="col-sm-10">
                                                    <input type="tel" name="phone" value="{{$user->phone}}" placeholder="Telephone" id="input-telephone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label" for="input-telephone">User Image</label>
                                                <div class="col-sm-10">
                                                    <img style=" max-height: 150px;" src="{{asset('public/vendor/'.$user->user_image)}}">
                                                    <input type="file" name="user_image" class="form-control">
                                                
                                                </div>
                                            </div>
                    
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <input type="submit" class="btn btn-danger" name=""> 
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection