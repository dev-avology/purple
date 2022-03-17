@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  @include('flash-message')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Customers</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ul class="list-group list-group-horizontal float-md-right mt-2">
            <li class="list-group-item">
              <a href="#" class="text-secondary">Export</a>
            </li>
          </ul>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header border-0">
              <form action="">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Filter customers">
                </div>
              </form>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-valign-middle table-hover cursor-pointer">
                <thead>
                  <tr>
                    <th>Name / Location</th>
                    <th>Email</th>
                    <th>Artist</th>
                    <th>Orders</th>
                    <th>Spent</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if ($user->role === $sellerRole)
                    <td><i class="fas fa-check-circle"></i></td>
                    @else
                    <td><i class="fas fa-times"></i></td>
                    @endif
                    <td>0 order</td>
                    <td>€0.00</td>
                    <td>
                      @if ($user->role === $sellerRole)
                      <a href="{{ route('view-seller-customer', ['userID' => $user->id, 'userName' => $user->name]) }}">
                        <i class="fa fa-eye"></i>
                      </a>
                      @else
                      <a href="{{ route('view-buyer-customer', ['userID' => $user->id, 'userName' => $user->name]) }}">
                        <i class="fa fa-eye"></i>
                      </a>
                      @endif
                      <a href="{{route('delete-customer', ['userID' => $user->id])}}" onclick="return confirm('Are you sure.')">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>

        <!-- /.col-md-12 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection