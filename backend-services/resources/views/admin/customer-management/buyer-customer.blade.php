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

          <div class="col-md-8">

            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-4 text-center">
                    <p class="h6">Last order</p>
                    <p class="text-bold">2 days ago</p>
                  </div>
                  <div class="col-4 text-center">
                    <p class="h6">Total spent to date</p>
                    <p class="text-bold">124.90€</p>
                  </div>
                  <div class="col-4 text-center">
                    <p class="h6">Average order value</p>
                    <p class="text-bold">43.00€</p>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title float-left text-bold">Last order placed</h3>
              </div>
              <div class="card-body">
                <table class="table table-borderless table-valign-middle">
                  <tbody>
                    <tr>
                      <td class="col-1">
                        <img src="{{ asset('public/admin/dist/img/paint-demo.jpeg') }}" class="img-fluid mr-2 pt-2 img-max-600">
                      </td>
                      <td class="col-7">
                        Canvas Orange
                        <span class="text-secondary d-block">Size: Medium</span>
                        <span class="text-secondary d-block">Product ID: 0123</span>  
                      </td>
                      <td class="col-2">€20 x 2</td>
                      <td class="col-2 text-right">€40</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>

          <div class="col-md-4">

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Customer overview</h3>
              </div>
              <div class="card-body">
                <strong>{{ $user->name }}</strong>
                <p class="text-muted">
                  14 orders on website
                </p>
                <hr>
                <strong>Contact Information</strong>
                <p class="text-muted">{{ $user->email }}</p>
                <hr>
                <strong>Shipping Address</strong>
                <p class="text-muted">
                  James Black<br>
                  22 Water St<br>
                  88000 Orange<br>
                  France<br>
                  06 12 34 56 78
                </p>
                <hr>
                <strong>Billing Address</strong>
                <p class="text-muted">Same as shipping address</p>
              </div>
              <!-- /.card-body -->
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

@section('modal')
<!-- MODAL -->
<div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form action="">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Notes about this order</label>
            <textarea class="form-control" id="notes" placeholder="Your notes" rows="5">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection
