@extends('layouts.admin')
@section('content')
@include('flash-message')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <a href="{{ route('customers') }}" class="btn btn-outline-dark float-left mr-3">
              <i class="fas fa-angle-left"></i>
            </a>
            <h1 class="m-0">Customer: {{$user->name}}</h1>
          </div><!-- /.col --> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                 <form method="POST" action="{{route('update-seller')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">User Name</label>
                        <input type="text"name="user_name"value="{{$user->name}}" class="form-control" id="exampleInputUserName" placeholder="User Name">
                    </div>                  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="user_email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">First Name</label>
                        <input type="text"name="first_name"value="{{optional($user->profile)->first_name}}" class="form-control" id="exampleInputUserName" placeholder="User Name">
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Last Name</label>
                        <input type="text"name="last_name"value="{{optional($user->profile)->last_name}}" class="form-control" id="exampleInputUserName" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Display Name</label>
                        <input type="text"name="display_name"value="{{optional($user->profile)->display_name}}" class="form-control" id="exampleInputUserName" placeholder="User Name">
                    </div>   
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bio</label>
                        <input type="text"name="bio"value="{{optional($user->profile)->bio}}" class="form-control" id="exampleInputUserName" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        
                        <img src="{{asset('uploads/user-profile-avatar/'.optional($user->profile)->user_avatar)}}" target="_blank">
                    </div>
                    <div class="form-group">
                        <label for="exampleUpdateUserImage">Update Image</label>
                        <input type="file" name="user_avatar"class="form-control">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                    </div>                    
                    <button type="submit" class="btn btn-primary">Save-Update</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

